<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager | Cytonn Investments</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #00676e;
            --navy-light: #00838f;
            --gold: #8dc63f;
            --gold-light: #a3d45a;
            --white: #ffffff;
            --gray-light: #f4f6f9;
            --gray: #e0e4ea;
            --text: #2c3e50;
            --text-muted: #6b7a8d;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--gray-light);
            color: var(--text);
            min-height: 100vh;
        }

        /* Navbar */
        nav {
            background: var(--white);
            border-bottom: 3px solid var(--navy);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-logo {
            width: 36px;
            height: 36px;
            background: var(--gold);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--navy);
            font-size: 16px;
        }

        .nav-title {
            color: var(--navy);
            font-size: 18px;
            font-weight: 600;
        }

        .nav-title span {
            color: var(--navy);
        }

        .nav-subtitle {
            color: var(--text-muted);
            font-size: 12px;
        }

        /* Layout */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* Stats bar */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            border-left: 4px solid var(--gold);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .stat-card.high {
            border-color: var(--danger);
        }

        .stat-card.medium {
            border-color: var(--warning);
        }

        .stat-card.low {
            border-color: var(--success);
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--navy);
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        /* Two column layout */
        .layout {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        /* Form card */
        .card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .card-header {
            background: var(--navy);
            padding: 1rem 1.5rem;
            color: var(--white);
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-header .dot {
            width: 8px;
            height: 8px;
            background: var(--gold);
            border-radius: 50%;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid var(--gray);
            border-radius: 8px;
            font-size: 14px;
            color: var(--text);
            background: var(--white);
            transition: border-color 0.2s;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: var(--gold);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--navy);
            color: var(--white);
            width: 100%;
            padding: 12px;
        }

        .btn-primary:hover {
            background: var(--navy-light);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
        }

        .btn-advance {
            background: var(--gold);
            color: var(--navy);
        }

        .btn-advance:hover {
            background: var(--gold-light);
        }

        .btn-delete {
            background: #fdecea;
            color: var(--danger);
        }

        .btn-delete:hover {
            background: #f9d0cd;
        }

        /* Filter bar */
        .filter-bar {
            display: flex;
            gap: 8px;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 6px 16px;
            border-radius: 20px;
            border: 1.5px solid var(--gray);
            background: var(--white);
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-muted);
            font-weight: 500;
        }

        .filter-btn.active {
            background: var(--navy);
            color: var(--white);
            border-color: var(--navy);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead tr {
            background: var(--navy);
            color: var(--white);
        }

        th {
            padding: 12px 14px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid var(--gray);
        }

        tbody tr:hover {
            background: #f8f9fc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badges */
        .badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-high {
            background: #fdecea;
            color: var(--danger);
        }

        .badge-medium {
            background: #fef5e7;
            color: var(--warning);
        }

        .badge-low {
            background: #eafaf1;
            color: var(--success);
        }

        .badge-pending {
            background: #eaf0fb;
            color: #2980b9;
        }

        .badge-in_progress {
            background: #fef5e7;
            color: var(--warning);
        }

        .badge-done {
            background: #eafaf1;
            color: var(--success);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }

        .empty-state .icon {
            font-size: 40px;
            margin-bottom: 1rem;
        }

        /* Toast */
        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--navy);
            color: var(--white);
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 14px;
            border-left: 4px solid var(--gold);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(80px);
            opacity: 0;
            transition: all 0.3s;
            z-index: 1000;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast.error {
            border-color: var(--danger);
        }

        @media (max-width: 768px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-brand">
            <img src="/images/cytonn_logo.svg" alt="Cytonn Investments" style="height: 40px;">
            <div style="margin-left: 10px;">
                <div class="nav-title"><span>Task Manager</span></div>
                <div class="nav-subtitle">Investment Operations Dashboard</div>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- Stats -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number" id="stat-total">0</div>
                <div class="stat-label">Total Tasks</div>
            </div>
            <div class="stat-card high">
                <div class="stat-number" id="stat-high">0</div>
                <div class="stat-label">High Priority</div>
            </div>
            <div class="stat-card medium">
                <div class="stat-number" id="stat-pending">0</div>
                <div class="stat-label">Pending</div>
            </div>
            <div class="stat-card low">
                <div class="stat-number" id="stat-done">0</div>
                <div class="stat-label">Completed</div>
            </div>
        </div>

        <div class="layout">

            <!-- Create Task Form -->
            <div class="card">
                <div class="card-header">
                    <div class="dot"></div>
                    Create New Task
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Task Title</label>
                        <input type="text" id="title" placeholder="Enter task title">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" id="due_date">
                    </div>
                    <div class="form-group">
                        <label>Priority</label>
                        <select id="priority">
                            <option value="">Select priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" onclick="createTask()">Create Task</button>
                </div>
            </div>

            <!-- Tasks Table -->
            <div class="card">
                <div class="card-header">
                    <div class="dot"></div>
                    All Tasks
                </div>
                <div class="card-body" style="padding: 1rem 1.5rem 0.5rem">
                    <div class="filter-bar">
                        <button class="filter-btn active" onclick="filterTasks(this, '')">All</button>
                        <button class="filter-btn" onclick="filterTasks(this, 'pending')">Pending</button>
                        <button class="filter-btn" onclick="filterTasks(this, 'in_progress')">In Progress</button>
                        <button class="filter-btn" onclick="filterTasks(this, 'done')">Done</button>
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tasks-body">
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="icon">📋</div>
                                        <div>Loading tasks...</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Toast notification -->
    <div class="toast" id="toast"></div>

    <script>
        const API = '/api';

        // Set min date to today
        document.getElementById('due_date').min = new Date().toISOString().split('T')[0];

        function showToast(message, isError = false) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'toast show' + (isError ? ' error' : '');
            setTimeout(() => toast.className = 'toast', 3000);
        }

        async function loadTasks(status = '') {
            const url = status ? `${API}/tasks?status=${status}` : `${API}/tasks`;
            const res = await fetch(url);
            const data = await res.json();
            const tasks = Array.isArray(data) ? data : [];
            renderTasks(tasks);
            updateStats(tasks);
        }

        function updateStats(tasks) {
            document.getElementById('stat-total').textContent = tasks.length;
            document.getElementById('stat-high').textContent = tasks.filter(t => t.priority === 'high').length;
            document.getElementById('stat-pending').textContent = tasks.filter(t => t.status === 'pending').length;
            document.getElementById('stat-done').textContent = tasks.filter(t => t.status === 'done').length;
        }

        function renderTasks(tasks) {
            const tbody = document.getElementById('tasks-body');
            if (!tasks.length) {
                tbody.innerHTML = `<tr><td colspan="5"><div class="empty-state"><div class="icon">📋</div><div>No tasks found</div></div></td></tr>`;
                return;
            }
            tbody.innerHTML = tasks.map(task => `
            <tr>
                <td><strong>${task.title}</strong></td>
                <td>${task.due_date}</td>
                <td><span class="badge badge-${task.priority}">${task.priority}</span></td>
                <td><span class="badge badge-${task.status}">${task.status.replace('_', ' ')}</span></td>
                <td style="display:flex;gap:6px;flex-wrap:wrap">
                    ${task.status !== 'done' ? `<button class="btn btn-sm btn-advance" onclick="advanceStatus(${task.id})">Advance</button>` : ''}
                    ${task.status === 'done' ? `<button class="btn btn-sm btn-delete" onclick="deleteTask(${task.id})">Delete</button>` : ''}
                </td>
            </tr>
        `).join('');
        }

        async function createTask() {
            const title = document.getElementById('title').value.trim();
            const due_date = document.getElementById('due_date').value;
            const priority = document.getElementById('priority').value;

            if (!title || !due_date || !priority) {
                showToast('Please fill in all fields', true);
                return;
            }

            const res = await fetch(`${API}/tasks`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ title, due_date, priority })
            });

            const data = await res.json();

            if (!res.ok) {
                showToast(data.message || 'Error creating task', true);
                return;
            }

            document.getElementById('title').value = '';
            document.getElementById('due_date').value = '';
            document.getElementById('priority').value = '';
            showToast('Task created successfully!');
            loadTasks();
        }

        async function advanceStatus(id) {
            const res = await fetch(`${API}/tasks/${id}/status`, {
                method: 'PATCH',
                headers: { 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (!res.ok) {
                showToast(data.message || 'Error updating status', true);
                return;
            }
            showToast(`Status updated to: ${data.status.replace('_', ' ')}`);
            loadTasks();
        }

        async function deleteTask(id) {
            if (!confirm('Are you sure you want to delete this task?')) return;
            const res = await fetch(`${API}/tasks/${id}`, {
                method: 'DELETE',
                headers: { 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (!res.ok) {
                showToast(data.message || 'Error deleting task', true);
                return;
            }
            showToast('Task deleted successfully!');
            loadTasks();
        }

        function filterTasks(btn, status) {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            loadTasks(status);
        }

        // Initial load
        loadTasks();
    </script>
</body>

</html>