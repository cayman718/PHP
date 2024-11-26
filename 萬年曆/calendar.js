class Dashboard {
    constructor() {
        // 初始化基本屬性
        this.today = new Date();
        this.currentDate = new Date();
        this.selectedDate = null;
        this.events = new Map();
        this.todos = new Map();
        this.history = new Map();
        this.important = new Map();

        // 初始化 DOM 元素
        this.calendarGrid = document.querySelector('.calendar-grid');
        this.monthYearDisplay = document.querySelector('.date-nav h2');

        // 綁定導航按鈕事件
        document.querySelector('.today-btn').addEventListener('click', () => this.goToToday());
        const navButtons = document.querySelectorAll('.nav-controls .btn');
        navButtons[1].addEventListener('click', () => this.previousMonth());
        navButtons[2].addEventListener('click', () => this.nextMonth());

        // 渲染日曆
        this.renderCalendar();

        // 初始化事項相關功能
        this.initEventHandlers();

        // 初始化待辦清單功能
        this.initTodoFeatures();

        // 新增：渲染即將到來的事項
        this.renderUpcomingEvents();

        // 初始化統計
        this.updateStats();
    }

    initEventHandlers() {
        // 快速新增待辦的輸入框
        const quickAddInput = document.querySelector('.quick-add input');
        const quickAddBtn = document.querySelector('.quick-add-btn');
        
        // 新增待辦按鈕
        quickAddBtn.addEventListener('click', () => {
            const text = quickAddInput.value.trim();
            if (text) {
                this.addTodo(text);
                quickAddInput.value = '';
            }
        });

        // 輸入框按 Enter 也可以新增
        quickAddInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const text = quickAddInput.value.trim();
                if (text) {
                    this.addTodo(text);
                    quickAddInput.value = '';
                }
            }
        });

        // 日曆格子點擊事件
        this.calendarGrid.addEventListener('click', (e) => {
            const cell = e.target.closest('.calendar-cell');
            if (cell) {
                this.showAddEventDialog(cell);
            }
        });

        // 篩選按鈕
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                this.filterTodos(btn.textContent.trim());
            });
        });
    }

    renderCalendar() {
        const year = this.currentDate.getFullYear();
        const month = this.currentDate.getMonth();
        
        // 更新月份顯示
        this.monthYearDisplay.textContent = `${year}年${month + 1}月`;
        
        // 清空日曆網格
        this.calendarGrid.innerHTML = '';
        
        // 添加星期標題
        const weekdays = ['日', '一', '二', '三', '四', '五', '六'];
        weekdays.forEach(day => {
            const headerCell = document.createElement('div');
            headerCell.className = 'calendar-header-cell';
            headerCell.textContent = day;
            this.calendarGrid.appendChild(headerCell);
        });

        // 獲取當月第一天和最後一天
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        
        // 計算需要顯示的天數
        const totalDays = 35; // 5行 x 7列
        const firstDayIndex = firstDay.getDay();
        
        // 填充日期
        for (let i = 0; i < totalDays; i++) {
            const date = new Date(year, month, i - firstDayIndex + 1);
            const isCurrentMonth = date.getMonth() === month;
            
            const cell = document.createElement('div');
            cell.className = 'calendar-cell';
            
            if (!isCurrentMonth) {
                cell.classList.add('other-month');
            }
            
            const dateContainer = document.createElement('div');
            dateContainer.className = 'date-container';
            dateContainer.textContent = date.getDate();
            
            if (this.isToday(date)) {
                cell.classList.add('today');
            }
            
            cell.appendChild(dateContainer);
            this.calendarGrid.appendChild(cell);
        }
    }

    // 輔助方法
    isToday(date) {
        const today = new Date();
        return date.getDate() === today.getDate() &&
               date.getMonth() === today.getMonth() &&
               date.getFullYear() === today.getFullYear();
    }

    goToToday() {
        this.currentDate = new Date();
        this.renderCalendar();
    }

    previousMonth() {
        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
        this.renderCalendar();
    }

    nextMonth() {
        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
        this.renderCalendar();
    }

    addTodo(text) {
        if (!text) return;

        const todo = {
            id: Date.now(),
            text: text,
            completed: false,
            date: this.formatDate(new Date())
        };

        this.todos.set(todo.id, todo);
        
        // 立即更新所有相關顯示
        this.renderTodos();           // 更新右欄待辦列表
        this.updateStats();           // 更新左欄統計
        this.renderUpcomingEvents();  // 更新左欄即將到來
        
        console.log('新增待辦事項：', {
            todo: todo,
            totalActive: this.getActiveTodosCount()
        });
    }

    showAddEventDialog(cell) {
        const date = this.getCellDate(cell);
        
        const dialog = document.createElement('div');
        dialog.className = 'todo-dialog';
        dialog.innerHTML = `
            <div class="dialog-content">
                <h3>新增事項</h3>
                <input type="text" placeholder="事項內容..." class="event-title">
                <input type="date" class="event-date" value="${this.formatDateForInput(date)}">
                <div class="dialog-buttons">
                    <button class="btn cancel">取消</button>
                    <button class="btn confirm">確定</button>
                </div>
            </div>
        `;

        document.body.appendChild(dialog);

        const titleInput = dialog.querySelector('.event-title');
        const dateInput = dialog.querySelector('.event-date');

        // 綁定確定按鈕事件
        dialog.querySelector('.confirm').addEventListener('click', () => {
            const title = titleInput.value.trim();
            if (title) {
                this.addEvent(title, dateInput.value);
                dialog.remove();
            }
        });

        // 綁定取消按鈕事件
        dialog.querySelector('.cancel').addEventListener('click', () => {
            dialog.remove();
        });

        titleInput.focus();
    }

    // 新增：獲取日曆格子的日期
    getCellDate(cell) {
        const year = this.currentDate.getFullYear();
        const month = this.currentDate.getMonth();
        const day = parseInt(cell.querySelector('.date-container').textContent);
        
        // 處理跨月份的情況
        let adjustedMonth = month;
        if (cell.classList.contains('other-month')) {
            if (day > 20) { // 上個月的日期
                adjustedMonth = month - 1;
            } else { // 下個月的日期
                adjustedMonth = month + 1;
            }
        }
        
        return new Date(year, adjustedMonth, day);
    }

    // 新增：添加事項方法
    addEvent(title, date) {
        const event = {
            id: Date.now(),
            title: title,
            date: date,
            timestamp: new Date(date).getTime()
        };

        this.events.set(event.id, event);
        this.renderUpcomingEvents();
        this.updateStats();
    }

    // 新增：渲染即將到來的事項
    renderUpcomingEvents() {
        const eventsList = document.querySelector('.events-list');
        eventsList.innerHTML = '';

        // 獲取本週的開始和結束時間
        const today = new Date();
        const weekStart = new Date(today);
        weekStart.setDate(today.getDate() - today.getDay());
        const weekEnd = new Date(weekStart);
        weekEnd.setDate(weekStart.getDate() + 6);

        // 篩選本週事項
        const weekEvents = Array.from(this.events.values())
            .filter(event => {
                const eventDate = new Date(event.date);
                return eventDate >= weekStart && eventDate <= weekEnd;
            })
            .sort((a, b) => a.timestamp - b.timestamp);

        // 渲染事項
        weekEvents.forEach(event => {
            const eventElement = document.createElement('div');
            eventElement.className = 'upcoming-event';
            
            const eventDate = new Date(event.date);
            const formattedDate = `${eventDate.getMonth() + 1}月${eventDate.getDate()}日`;
            
            eventElement.innerHTML = `
                <div class="event-date">${formattedDate}</div>
                <div class="event-title">${event.title}</div>
            `;
            
            eventsList.appendChild(eventElement);
        });

        // 更新統計數據
        document.querySelector('.stat-item:first-child .stat-value').textContent = weekEvents.length;
    }

    filterTodos(filter) {
        const todoList = document.querySelector('.todo-list');
        todoList.innerHTML = '';

        const filteredTodos = Array.from(this.todos.values()).filter(todo => {
            switch(filter) {
                case '今日待辦':
                    return todo.date === this.formatDate(new Date());
                case '未來待辦':
                    return new Date(todo.date) > new Date();
                case '已完成':
                    return todo.completed;
                default:
                    return true;
            }
        });

        filteredTodos.forEach(todo => {
            const todoItem = document.createElement('div');
            todoItem.className = `todo-item ${todo.completed ? 'completed' : ''}`;
            todoItem.innerHTML = `
                <input type="checkbox" ${todo.completed ? 'checked' : ''}>
                <span>${todo.text}</span>
                <button class="delete-btn"><i class="fas fa-trash"></i></button>
            `;

            // 綁定待辦事項的事件
            const checkbox = todoItem.querySelector('input');
            checkbox.addEventListener('change', () => {
                todo.completed = checkbox.checked;
                todoItem.classList.toggle('completed');
                this.updateStats();
            });

            const deleteBtn = todoItem.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', () => {
                this.todos.delete(todo.id);
                this.renderTodos();
                this.updateStats();
            });

            todoList.appendChild(todoItem);
        });
    }

    initTodoFeatures() {
        // 修改選擇器以匹配新的 class 名稱
        const addTodoBtn = document.querySelector('.add-todo-btn');
        addTodoBtn.addEventListener('click', () => this.showAddTodoDialog());

        // 綁定快速新增功能
        const quickAddInput = document.querySelector('.quick-add input');
        const quickAddBtn = document.querySelector('.quick-add-btn');
        
        quickAddBtn.addEventListener('click', () => {
            const text = quickAddInput.value.trim();
            if (text) {
                this.addTodo(text);
                quickAddInput.value = '';
            }
        });

        quickAddInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const text = quickAddInput.value.trim();
                if (text) {
                    this.addTodo(text);
                    quickAddInput.value = '';
                }
            }
        });
    }

    showAddTodoDialog() {
        const dialog = document.createElement('div');
        dialog.className = 'todo-dialog';
        dialog.innerHTML = `
            <div class="dialog-content">
                <h3>新增待辦事項</h3>
                <input type="text" placeholder="待辦事項..." class="todo-title">
                <input type="date" class="todo-date" value="${this.formatDateForInput(new Date())}">
                <div class="dialog-buttons">
                    <button class="btn cancel">取消</button>
                    <button class="btn confirm">確定</button>
                </div>
            </div>
        `;

        document.body.appendChild(dialog);

        const titleInput = dialog.querySelector('.todo-title');
        const dateInput = dialog.querySelector('.todo-date');
        const confirmBtn = dialog.querySelector('.confirm');
        const cancelBtn = dialog.querySelector('.cancel');

        // 綁定確定按鈕事件
        confirmBtn.addEventListener('click', () => {
            const title = titleInput.value.trim();
            const date = dateInput.value;
            
            if (title) {
                this.addTodo(title, date);
                dialog.remove();
            }
        });

        // 綁定取消按鈕事件
        cancelBtn.addEventListener('click', () => {
            dialog.remove();
        });

        // 綁定按 Enter 鍵也可以新增
        titleInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && titleInput.value.trim()) {
                this.addTodo(titleInput.value.trim(), dateInput.value);
                dialog.remove();
            }
        });

        // 自動聚焦到輸入框
        titleInput.focus();
    }

    addTodo(text, date = null) {
        const todo = {
            id: Date.now(),
            text: text,
            completed: false,
            date: date || this.formatDate(new Date())
        };

        this.todos.set(todo.id, todo);
        this.renderTodos();
        this.updateStats();
    }

    // 輔助方法：格式化日期為 input[type="date"] 使用的格式
    formatDateForInput(date) {
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    }

    // 修改刪除邏輯
    deleteTodo(todo) {
        this.todos.delete(todo.id);
        this.renderTodos();
        this.updateStats();
    }

    // 修改完成邏輯
    completeTodo(todo, completed) {
        if (completed) {
            // 將完成的事項移到歷史紀錄
            const historyItem = {
                ...todo,
                completedAt: new Date(),
                status: '已完成'
            };
            this.history.set(todo.id, historyItem);
            this.todos.delete(todo.id);
        }
        this.renderTodos();
        this.updateStats();
    }

    // 修改渲染邏輯
    renderTodos() {
        const todoList = document.querySelector('.todo-list');
        todoList.innerHTML = '';
        
        const activeFilter = document.querySelector('.filter-btn.active').textContent.trim();
        
        let filteredTodos = Array.from(this.todos.values());
        if (activeFilter === '今日待辦') {
            filteredTodos = filteredTodos.filter(todo => !todo.completed);
        } else if (activeFilter === '已完成') {
            filteredTodos = filteredTodos.filter(todo => todo.completed);
        }

        if (filteredTodos.length === 0) {
            const emptyMessage = document.createElement('div');
            emptyMessage.className = 'empty-message';
            emptyMessage.textContent = activeFilter === '已完成' ? '沒有已完成的事項' : '沒有待辦事項';
            todoList.appendChild(emptyMessage);
            return;
        }

        filteredTodos.forEach(todo => {
            const todoItem = document.createElement('div');
            todoItem.className = 'todo-item';
            if (todo.completed) {
                todoItem.classList.add('completed');
            }
            
            todoItem.innerHTML = `
                <input type="checkbox" ${todo.completed ? 'checked' : ''}>
                <span class="todo-title">${todo.text}</span>
                <button class="todo-delete"><i class="fas fa-trash"></i></button>
            `;

            // 勾選框事件
            const checkbox = todoItem.querySelector('input[type="checkbox"]');
            checkbox.addEventListener('change', () => {
                todo.completed = checkbox.checked;
                this.updateTodo(todo);
            });

            // 修改：刪除按鈕事件 - 直接刪除並更新
            const deleteBtn = todoItem.querySelector('.todo-delete');
            deleteBtn.addEventListener('click', (e) => {
                e.stopPropagation(); // 防止事件冒泡
                this.todos.delete(todo.id);
                todoItem.remove(); // 直接從 DOM 中移除
                this.updateStats();
                this.renderUpcomingEvents();
                
                // 如果刪除後列表為空，重新渲染以顯示空提示
                if (this.todos.size === 0) {
                    this.renderTodos();
                }
                
                console.log('已刪除待辦事項：', todo.text); // 除錯信息
            });

            todoList.appendChild(todoItem);
        });
    }

    // 修改：更新待辦事項
    updateTodo(todo) {
        this.todos.set(todo.id, todo);
        this.renderTodos();     // 立即重新渲染
        this.updateStats();     // 更新統計
        this.renderUpcomingEvents(); // 更新左欄
        
        console.log('已更新待辦事項：', todo); // 除錯信息
    }

    // 修改：刪除待辦事項
    deleteTodo(todo) {
        this.todos.delete(todo.id);
        this.renderUpcomingEvents();
        this.updateStats();
    }

    // 修改：篩選待辦事項
    filterTodos(filter) {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.toggle('active', btn.textContent.trim() === filter);
        });
        this.renderTodos();
    }

    // 新增：格式化日期時間顯示
    formatDateTimeForDisplay(date) {
        const month = date.getMonth() + 1;
        const day = date.getDate();
        const hour = String(date.getHours()).padStart(2, '0');
        const minute = String(date.getMinutes()).padStart(2, '0');
        return `${month}月${day}日 ${hour}:${minute}`;
    }

    // 確保有這個輔助方法
    formatDate(date) {
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    }

    // 修改：更新統計方法
    updateStats() {
        const today = new Date();
        const weekStart = new Date(today);
        weekStart.setDate(today.getDate() - today.getDay());
        const weekEnd = new Date(weekStart);
        weekEnd.setDate(weekStart.getDate() + 6);

        // 計算本週事項數量
        const weekEvents = Array.from(this.events.values()).filter(event => {
            const eventDate = new Date(event.date);
            return eventDate >= weekStart && eventDate <= weekEnd;
        });

        // 計算待辦事項數量（未完成的）
        const activeTodos = Array.from(this.todos.values()).filter(todo => !todo.completed);

        // 計算重要提醒數量
        const importantCount = this.important.size;

        // 更新顯示
        document.querySelector('.stat-item:nth-child(1) .stat-value').textContent = weekEvents.length;
        document.querySelector('.stat-item:nth-child(2) .stat-value').textContent = activeTodos.length;
        document.querySelector('.stat-item:nth-child(3) .stat-value').textContent = importantCount;
    }

    // 渲染左欄的即將到來事項
    renderUpcomingEvents() {
        const eventsList = document.querySelector('.events-list');
        eventsList.innerHTML = '';

        const today = new Date();
        const nextWeek = new Date(today);
        nextWeek.setDate(today.getDate() + 7);

        // 合併所有類型的事項
        let allEvents = [
            ...Array.from(this.events.values()).map(e => ({...e, type: '一般事項'})),
            ...Array.from(this.todos.values()).map(t => ({...t, type: '待辦事項', title: t.text})),
            ...Array.from(this.important.values()).map(i => ({...i, type: '重要提醒'}))
        ];

        // 按日期排序
        allEvents.sort((a, b) => new Date(a.date) - new Date(b.date));

        // 只顯示未來一週的事項
        allEvents = allEvents.filter(event => {
            const eventDate = new Date(event.date);
            return eventDate >= today && eventDate <= nextWeek;
        });

        // 渲染事項
        allEvents.forEach(event => {
            const eventElement = document.createElement('div');
            eventElement.className = 'upcoming-event';
            
            // 根據類型設置不同的樣式
            if (event.type === '重要提醒') {
                eventElement.classList.add('important');
            }
            
            const eventDate = new Date(event.date);
            const formattedDate = `${eventDate.getMonth() + 1}月${eventDate.getDate()}日`;
            
            eventElement.innerHTML = `
                <div class="event-date">${formattedDate}</div>
                <div class="event-content">
                    <div class="event-title">${event.title}</div>
                    <div class="event-type">${event.type}</div>
                </div>
            `;
            
            eventsList.appendChild(eventElement);
        });
    }

    // 添加重要提醒
    addImportantEvent(title, date) {
        const event = {
            id: Date.now(),
            title: title,
            date: date,
            timestamp: new Date(date).getTime()
        };

        this.important.set(event.id, event);
        this.renderUpcomingEvents();
        this.updateStats();
    }

    // 新增：獲取未完成待辦數量的方法
    getActiveTodosCount() {
        return Array.from(this.todos.values()).filter(todo => !todo.completed).length;
    }

    // 修改：更新待辦事項
    updateTodo(todo) {
        this.todos.set(todo.id, todo);
        
        // 立即更新所有相關顯示
        this.renderTodos();
        this.updateStats();
        this.renderUpcomingEvents();
        
        console.log('更新待辦事項：', {
            todo: todo,
            totalActive: this.getActiveTodosCount()
        });
    }

    // 修改：刪除待辦事項
    deleteTodo(todo) {
        this.todos.delete(todo.id);
        
        // 立即更新所有相關顯示
        this.renderTodos();
        this.updateStats();
        this.renderUpcomingEvents();
        
        console.log('刪除待辦事項：', {
            todoId: todo.id,
            totalActive: this.getActiveTodosCount()
        });
    }
}

// 初始化儀表板
document.addEventListener('DOMContentLoaded', () => {
    const dashboard = new Dashboard();
});