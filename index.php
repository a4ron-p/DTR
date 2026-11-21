<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#2563eb">
<title>DTR & Payroll Tracker</title>


<style>


:root {
  --primary: #2563eb;
  --success: #10b981;
  --danger: #ef4444;
  --purple: #8b5cf6;
  --bg: #f3f5f9;
  --surface: #ffffff;
  --surface2: #f8fafc;
  --text: #1e293b;
  --muted: #64748b;
  --border: #e2e8f0;
  --shadow: 0 4px 20px rgba(15,23,42,.05);
}


[data-theme="dark"] {
  --bg: #0f172a;
  --surface: #1e293b;
  --surface2: #263449;
  --text: #f1f5f9;
  --muted: #94a3b8;
  --border: #334155;
  --shadow: 0 4px 20px rgba(0,0,0,.2);
}


* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}


body {
  font-family: Inter, -apple-system, BlinkMacSystemFont,
    "Segoe UI", sans-serif;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  transition: background .2s, color .2s;
}


button, input, select, textarea {
  font: inherit;
}


button {
  cursor: pointer;
  transition: .2s ease;
}


button:disabled {
  opacity: .45;
  cursor: not-allowed;
}


.app {
  display: flex;
  min-height: 100vh;
}


/* SIDEBAR */


.sidebar {
  width: 275px;
  min-width: 275px;
  background: var(--surface);
  border-right: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  height: 100vh;
  position: sticky;
  top: 0;
  z-index: 20;
}


.brand {
  padding: 24px 20px;
  display: flex;
  gap: 12px;
  align-items: center;
  border-bottom: 1px solid var(--border);
}


.brand-icon {
  width: 42px;
  height: 42px;
  border-radius: 13px;
  background: var(--primary);
  color: white;
  display: grid;
  place-items: center;
  font-size: 22px;
  font-weight: 800;
}


.brand h2 {
  font-size: 16px;
}


.brand p {
  font-size: 11px;
  color: var(--muted);
  margin-top: 4px;
}


.sidebar-content {
  padding: 20px 15px 10px;
}


.section-label {
  font-size: 11px;
  font-weight: 750;
  color: var(--muted);
  text-transform: uppercase;
  letter-spacing: .9px;
  margin-bottom: 12px;
}


.search-box {
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 10px;
  border: 1px solid var(--border);
  border-radius: 10px;
  background: var(--surface2);
  margin-bottom: 12px;
}


.search-box input {
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: var(--text);
  font-size: 13px;
}


.cutoff-list {
  flex: 1;
  overflow-y: auto;
  padding: 5px 12px;
}


.cutoff-item {
  padding: 13px;
  border-radius: 10px;
  cursor: pointer;
  margin-bottom: 5px;
  border: 1px solid transparent;
  transition: .2s;
}


.cutoff-item:hover {
  background: var(--surface2);
}


.cutoff-item.active {
  background: rgba(37,99,235,.09);
  border-color: rgba(37,99,235,.25);
}


.cutoff-name {
  font-size: 13px;
  font-weight: 700;
}


.cutoff-dates {
  font-size: 11px;
  color: var(--muted);
  margin-top: 5px;
}


.sidebar-footer {
  display: flex;
  gap: 8px;
  padding: 14px;
  border-top: 1px solid var(--border);
}


.sidebar-footer button {
  flex: 1;
}


.new-cutoff {
  width: 100%;
}


/* BUTTONS */


.btn {
  border: none;
  border-radius: 9px;
  padding: 11px 15px;
  font-size: 13px;
  font-weight: 650;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  gap: 7px;
}


.btn:hover:not(:disabled) {
  transform: translateY(-1px);
  filter: brightness(.97);
}


.btn-primary {
  background: var(--primary);
  color: white;
}


.btn-success {
  background: var(--success);
  color: white;
}


.btn-danger {
  background: var(--danger);
  color: white;
}


.btn-secondary {
  background: var(--surface2);
  color: var(--text);
  border: 1px solid var(--border);
}


.btn-outline-danger {
  background: transparent;
  border: 1px solid var(--danger);
  color: var(--danger);
}


.btn-sm {
  padding: 8px 11px;
  font-size: 12px;
}


/* MAIN WORKSPACE */


.main {
  flex: 1;
  min-width: 0;
  padding: 28px;
  max-width: 1800px;
  margin: 0 auto;
  width: 100%;
}


.topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 15px;
  margin-bottom: 28px;
}


.topbar h1 {
  font-size: clamp(19px, 3vw, 26px);
  letter-spacing: -.5px;
}


.topbar p {
  font-size: 12px;
  color: var(--muted);
  margin-top: 6px;
}


.top-actions {
  display: flex;
  gap: 8px;
}


.topbar-left {
  display: flex;
  gap: 12px;
  align-items: center;
  min-width: 0;
}


.mobile-menu {
  display: none;
  border: 1px solid var(--border);
  background: var(--surface);
  color: var(--text);
  border-radius: 9px;
  padding: 9px 12px;
}


/* SUMMARY CARDS */


.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0,1fr));
  gap: 15px;
  margin-bottom: 20px;
}


.stat-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 13px;
  padding: 19px;
  box-shadow: var(--shadow);
  min-width: 0;
}


.stat-label {
  color: var(--muted);
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 12px;
}


.stat-value {
  font-size: clamp(19px, 2.5vw, 25px);
  font-weight: 800;
  letter-spacing: -.6px;
  overflow-wrap: anywhere;
}


.stat-sub {
  font-size: 11px;
  color: var(--muted);
  margin-top: 8px;
}


.blue { color: var(--primary); }
.green { color: var(--success); }
.red { color: var(--danger); }
.purple { color: var(--purple); }


/* ATTENDANCE ACTIONS */


.action-panel {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 20px;
  margin-bottom: 22px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 15px;
  box-shadow: var(--shadow);
}


.action-title {
  font-weight: 750;
  font-size: 15px;
}


.action-description {
  color: var(--muted);
  font-size: 12px;
  margin-top: 6px;
}


.action-buttons {
  display: flex;
  flex-wrap: wrap;
  gap: 9px;
}


/* TABLE */


.table-container {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 20px;
  box-shadow: var(--shadow);
}


.table-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 17px;
}


.table-header h3,
.rate-container h3 {
  font-size: 16px;
}


.table-header p {
  color: var(--muted);
  font-size: 11px;
  margin-top: 5px;
}


.table-controls {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}


.table-controls select,
.form-group input,
.form-group select,
.form-group textarea {
  background: var(--surface2);
  color: var(--text);
  border: 1px solid var(--border);
  border-radius: 9px;
  padding: 10px;
  outline: none;
  width: 100%;
}


.table-controls select {
  width: auto;
  min-width: 130px;
  font-size: 12px;
}


.table-scroll {
  overflow-x: auto;
  width: 100%;
}


table {
  border-collapse: collapse;
  width: 100%;
  min-width: 1150px;
  text-align: left;
}


th {
  background: var(--surface2);
  color: var(--muted);
  font-size: 10px;
  text-transform: uppercase;
  letter-spacing: .5px;
  padding: 13px 11px;
  white-space: nowrap;
}


td {
  border-bottom: 1px solid var(--border);
  padding: 13px 11px;
  font-size: 12px;
  white-space: nowrap;
}


tbody tr:hover {
  background: var(--surface2);
}


.money {
  font-weight: 700;
}


.row-actions {
  display: flex;
  gap: 5px;
}


.rate-container {
  margin-top: 20px;
}


.rate-container h3 {
  margin-bottom: 18px;
}


/* EMPTY STATES */


.empty-state {
  text-align: center;
  padding: 35px 15px;
  color: var(--muted);
}


.empty-state h3 {
  color: var(--text);
  font-size: 16px;
  margin: 12px 0 7px;
}


.empty-state p {
  font-size: 12px;
  line-height: 1.6;
}


.empty-icon {
  font-size: 36px;
}


.welcome-screen {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 16px;
  margin-top: 35px;
}


.welcome-screen button {
  margin-top: 18px;
}


/* MODALS */


.modal-backdrop {
  position: fixed;
  inset: 0;
  z-index: 100;
  background: rgba(15,23,42,.55);
  display: none;
  justify-content: center;
  align-items: center;
  padding: 15px;
}


.modal-backdrop.open {
  display: flex;
}


.modal {
  background: var(--surface);
  color: var(--text);
  width: 100%;
  max-width: 520px;
  max-height: 90vh;
  overflow-y: auto;
  border-radius: 16px;
  box-shadow: 0 20px 70px rgba(0,0,0,.2);
  animation: appear .2s ease;
}


@keyframes appear {
  from { opacity: 0; transform: translateY(12px); }
  to { opacity: 1; transform: translateY(0); }
}


.modal-header {
  padding: 19px 21px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid var(--border);
}


.modal-header h2 {
  font-size: 17px;
}


.modal-close {
  border: none;
  background: transparent;
  color: var(--muted);
  font-size: 25px;
}


.modal-body {
  padding: 21px;
}


.modal-footer {
  padding: 15px 21px;
  border-top: 1px solid var(--border);
  display: flex;
  justify-content: flex-end;
  gap: 9px;
}


/* FORMS */


.form-group {
  display: flex;
  flex-direction: column;
  gap: 7px;
  margin-bottom: 16px;
  min-width: 0;
}


.form-group label {
  font-size: 12px;
  font-weight: 700;
}


.form-group textarea {
  min-height: 85px;
  resize: vertical;
}


.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}


.form-group.full {
  grid-column: 1 / -1;
}


.helper {
  font-size: 11px;
  line-height: 1.6;
  color: var(--muted);
}


.rate-preview {
  padding: 15px;
  border-radius: 11px;
  background: var(--surface2);
  border: 1px solid var(--border);
  margin-bottom: 16px;
}


.rate-preview small {
  display: block;
  color: var(--muted);
  font-size: 10px;
  margin-bottom: 8px;
}


.rate-preview strong {
  font-size: 17px;
}


.rate-preview-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}


.rate-preview-grid strong {
  display: block;
  font-size: 15px;
}


/* BREAK TOGGLE */


.switch {
  position: relative;
  display: inline-block;
  width: 44px;
  min-width: 44px;
  height: 24px;
}


.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}


.switch span {
  position: absolute;
  inset: 0;
  background: #94a3b8;
  border-radius: 30px;
  cursor: pointer;
  transition: .2s;
}


.switch span::before {
  content: "";
  position: absolute;
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background: white;
  border-radius: 50%;
  transition: .2s;
}


.switch input:checked + span {
  background: var(--primary);
}


.switch input:checked + span::before {
  transform: translateX(20px);
}


/* TOAST */


.toast-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 200;
  display: grid;
  gap: 9px;
}


.toast {
  padding: 13px 17px;
  border-radius: 10px;
  background: #166534;
  color: white;
  font-size: 13px;
  box-shadow: var(--shadow);
  animation: appear .2s ease;
  max-width: 320px;
}


.toast.error {
  background: #b91c1c;
}


/* MOBILE DRAWER */


@media(max-width:900px) {
  .sidebar {
    position: fixed;
    left: -290px;
    top: 0;
    height: 100dvh;
    transition: left .25s;
  }


  .sidebar.open {
    left: 0;
  }


  .mobile-menu {
    display: block;
  }


  .overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.4);
    z-index: 19;
  }


  .overlay.show {
    display: block;
  }


  .main {
    padding: 20px;
  }
}


@media(max-width:650px) {
  .main {
    padding: 14px;
  }


  .topbar {
    align-items: flex-start;
    flex-wrap: wrap;
  }


  .top-actions {
    width: 100%;
  }


  .top-actions button {
    flex: 1;
  }


  .stats-grid {
    grid-template-columns: repeat(2,minmax(0,1fr));
    gap: 10px;
  }


  .stat-card {
    padding: 14px;
  }


  .action-panel {
    flex-direction: column;
    align-items: stretch;
  }


  .action-buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }


  .action-buttons button:last-child {
    grid-column: 1 / -1;
  }


  .table-container {
    padding: 13px;
  }


  .table-header {
    align-items: flex-start;
  }


  .table-controls {
    width: 100%;
  }


  .table-controls select {
    flex: 1;
  }


  .form-grid {
    grid-template-columns: 1fr;
    gap: 0;
  }


  .form-group.full {
    grid-column: auto;
  }


  .modal {
    max-height: 94dvh;
  }


  .toast-container {
    left: 12px;
    right: 12px;
    bottom: 12px;
  }


  .toast {
    max-width: none;
  }
}


@media(max-width:360px) {
  .stats-grid {
    grid-template-columns: 1fr;
  }
}



</style>
</head>


<body>


<div class="app">


<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">


  <div class="brand">
    <div class="brand-icon">D</div>
    <div>
      <h2>DTR & Payroll</h2>
      <p>Attendance Management</p>
    </div>
  </div>


  <div class="sidebar-content">
    <div class="section-label">Payroll Periods</div>


    <div class="search-box">
      <span>⌕</span>
      <input id="cutoffSearch" placeholder="Search cut-offs...">
    </div>


    <button class="btn btn-primary new-cutoff" id="newCutoffBtn">
      ＋ New Cut-Off
    </button>
  </div>


  <div class="cutoff-list" id="cutoffList"></div>


  <div class="sidebar-footer">
    <button class="btn btn-secondary btn-sm" id="settingsBtn">
      ⚙ Settings
    </button>


    <button class="btn btn-secondary btn-sm" id="themeBtn">
      ☾ Dark
    </button>
  </div>


</aside>


<div class="overlay" id="overlay"></div>


<!-- MAIN WORKSPACE -->
<main class="main">


  <header class="topbar">


    <div class="topbar-left">
      <button class="mobile-menu" id="menuBtn">☰</button>


      <div>
        <h1 id="dashboardTitle">
          Welcome to DTR & Payroll
        </h1>


        <p id="currentDateTime">Loading...</p>
      </div>
    </div>


    <div class="top-actions">


      <button class="btn btn-secondary btn-sm" id="backupBtn">
        ↓ Backup
      </button>


      <button class="btn btn-secondary btn-sm" id="restoreBtn">
        ↑ Restore
      </button>


      <input
        type="file"
        id="restoreInput"
        accept=".json,application/json"
        hidden
      >


    </div>


  </header>


  <!-- DASHBOARD -->
  <section id="dashboard" style="display:none">


    <!-- SUMMARY CARDS -->
    <div class="stats-grid">


      <div class="stat-card">
        <div class="stat-label">Days Worked</div>
        <div class="stat-value blue" id="daysWorked">0</div>
        <div class="stat-sub">Completed attendance</div>
      </div>


      <div class="stat-card">
        <div class="stat-label">Total Paid Hours</div>
        <div class="stat-value" id="totalHours">0.00</div>
        <div class="stat-sub">After break deduction</div>
      </div>


      <div class="stat-card">
        <div class="stat-label">Total OT Hours</div>
        <div class="stat-value red" id="totalOT">0.00</div>
        <div class="stat-sub">Overtime rendered</div>
      </div>


      <div class="stat-card">
        <div class="stat-label">Estimated Income</div>
        <div class="stat-value green" id="estimatedIncome">₱0.00</div>
        <div class="stat-sub">After late deductions</div>
      </div>


    </div>


    <!-- ATTENDANCE ACTIONS -->
    <div class="action-panel">


      <div>
        <div class="action-title">Attendance Tracker</div>


        <div class="action-description" id="attendanceStatus">
          Ready to record attendance.
        </div>
      </div>


      <div class="action-buttons">


        <button class="btn btn-success" id="timeInBtn">
          ◷ Time In
        </button>


        <button class="btn btn-danger" id="timeOutBtn" disabled>
          ◷ Time Out
        </button>


        <button class="btn btn-secondary" id="manualBtn">
          ＋ Manual Entry
        </button>


      </div>


    </div>


    <!-- ATTENDANCE TABLE -->
    <section class="table-container">


      <div class="table-header">


        <div>
          <h3>Attendance Records</h3>
          <p id="recordCount">0 records</p>
        </div>


        <div class="table-controls">


          <select id="sortBy" aria-label="Sort records">
            <option value="date-desc">Newest First</option>
            <option value="date-asc">Oldest First</option>
            <option value="income-desc">Highest Income</option>
            <option value="income-asc">Lowest Income</option>
            <option value="hours-desc">Most Hours</option>
            <option value="hours-asc">Least Hours</option>
            <option value="ot-desc">Most OT Hours</option>
            <option value="ot-asc">Least OT Hours</option>
          </select>


          <button class="btn btn-secondary btn-sm" id="exportCsvBtn">
            ↓ Export CSV
          </button>


        </div>


      </div>


      <div class="table-scroll">


        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Paid Hours</th>
              <th>OT Hours</th>
              <th>Late / Deduction</th>
              <th>Daily Rate</th>
              <th>Regular Pay</th>
              <th>OT Pay</th>
              <th>Night Diff.</th>
              <th>Net Income</th>
              <th>Remarks</th>
              <th>Actions</th>
            </tr>
          </thead>


          <tbody id="attendanceBody"></tbody>


        </table>


      </div>


      <div class="empty-state" id="emptyState">
        <div class="empty-icon">📅</div>
        <h3>No attendance records yet</h3>
        <p>Start by recording your Time In or adding a manual entry.</p>
      </div>


    </section>


    <!-- PAYROLL SUMMARY -->
    <div style="margin-top:22px">


      <div class="section-label">Payroll Summary</div>


      <div class="stats-grid">


        <div class="stat-card">
          <div class="stat-label">Total Regular Pay</div>
          <div class="stat-value green" id="regularPay">₱0.00</div>
        </div>


        <div class="stat-card">
          <div class="stat-label">Total OT Pay</div>
          <div class="stat-value red" id="otPay">₱0.00</div>
        </div>


        <div class="stat-card">
          <div class="stat-label">Night Differential</div>
          <div class="stat-value purple" id="nightPay">₱0.00</div>
        </div>


        <div class="stat-card">
          <div class="stat-label">Late Deduction</div>
          <div class="stat-value red" id="lateDeduction">₱0.00</div>
        </div>


      </div>


    </div>


    <!-- RATE INFORMATION -->
    <div class="table-container rate-container">


      <h3>Current Cut-Off Rate Information</h3>


      <div class="stats-grid">


        <div>
          <div class="stat-label">Daily Rate</div>
          <div class="stat-value blue" id="infoDaily">₱0.00</div>
        </div>


        <div>
          <div class="stat-label">Hourly Rate</div>
          <div class="stat-value" id="infoHourly">₱0.00</div>
        </div>


        <div>
          <div class="stat-label">OT Rate / Hour</div>
          <div class="stat-value red" id="infoOT">₱0.00</div>
        </div>


        <div>
          <div class="stat-label">Night Rate / Hour</div>
          <div class="stat-value purple" id="infoNight">₱0.00</div>
        </div>


      </div>


    </div>


  </section>


  <!-- WELCOME SCREEN -->
  <section id="welcomeScreen" class="empty-state welcome-screen">


    <div class="empty-icon">📊</div>


    <h3>Manage your attendance and payroll</h3>


    <p>Create your first payroll cut-off to get started.</p>


    <button class="btn btn-primary" id="welcomeCreateBtn">
      ＋ Create First Cut-Off
    </button>


  </section>


</main>


</div>


<!-- MODAL -->
<div class="modal-backdrop" id="modalBackdrop">


  <div class="modal" role="dialog" aria-modal="true">


    <div class="modal-header">
      <h2 id="modalTitle">Modal</h2>


      <button class="modal-close" id="modalClose">
        ×
      </button>
    </div>


    <form id="modalForm">


      <div class="modal-body" id="modalBody"></div>


      <div class="modal-footer" id="modalFooter"></div>


    </form>


  </div>


</div>


<!-- TOAST NOTIFICATIONS -->
<div class="toast-container" id="toastContainer"></div>


<!-- JAVASCRIPT WILL BE ADDED IN PARTS 3–6 -->


<script>

  

"use strict";


/* ==========================================
   1. APPLICATION DATA
========================================== */


const STORAGE_KEY = "dtr_payroll_tracker_v7";


const defaultSettings = {
  dailyRate: 800,
  dailyHours: 8,
  officialStartTime: "06:00",
  otPremium: 25,
  nightPremium: 10,
  currency: "₱",
  theme: "light",
  withBreakTime: false
};


let state = {
  cutoffs: [],
  selectedCutoffId: null,
  settings: { ...defaultSettings }
};


let modalCallback = null;


const $ = id => document.getElementById(id);


function uid() {
  return crypto.randomUUID ?
    crypto.randomUUID() :
    Date.now().toString(36) + Math.random().toString(36).slice(2);
}


function escapeHTML(value) {
  return String(value ?? "").replace(/[&<>"']/g, char => ({
    "&": "&amp;",
    "<": "<",
    ">": ">",
    '"': "&quot;",
    "'": "&#39;"
  }[char]));
}


function money(value) {
  return state.settings.currency +
    (Number(value) || 0).toLocaleString("en-PH", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
}


function formatDate(date) {
  if (!date) return "—";


  const d = new Date(date + "T00:00:00");


  return Number.isNaN(d.getTime()) ? date :
    d.toLocaleDateString("en-PH", {
      year: "numeric",
      month: "short",
      day: "2-digit"
    });
}


function getCurrentCutoff() {
  return state.cutoffs.find(c =>
    c.id === state.selectedCutoffId
  ) || null;
}


function notify(message, type = "success") {
  const toast = document.createElement("div");


  toast.className = "toast " + type;
  toast.textContent = message;


  $("toastContainer").appendChild(toast);


  setTimeout(() => toast.remove(), 3500);
}


/* ==========================================
   2. AUTOMATIC CUT-OFF PERIOD
========================================== */


function generateCutoffPeriod(date = new Date()) {
  const year = date.getFullYear();
  const month = date.getMonth();


  const first = date.getDate() <= 15;
  const start = first ? 1 : 16;
  const end = first ? 15 :
    new Date(year, month + 1, 0).getDate();


  const makeDate = day => [
    year,
    String(month + 1).padStart(2, "0"),
    String(day).padStart(2, "0")
  ].join("-");


  return {
    name: `${date.toLocaleDateString("en-US", {
      month: "long"
    })} ${start}-${end}, ${year}`,
    startDate: makeDate(start),
    endDate: makeDate(end)
  };
}


/* ==========================================
   3. LOCAL STORAGE
========================================== */


function saveState() {
  try {
    localStorage.setItem(
      STORAGE_KEY,
      JSON.stringify(state)
    );
  } catch (error) {
    console.error(error);
    notify("Unable to save data.", "error");
  }
}


function loadState() {
  try {
    const raw = localStorage.getItem(STORAGE_KEY);
    if (!raw) return;


    const parsed = JSON.parse(raw);


    if (!parsed || !Array.isArray(parsed.cutoffs)) {
      throw new Error("Invalid saved data.");
    }


    state.cutoffs = parsed.cutoffs;
    state.selectedCutoffId = parsed.selectedCutoffId || null;


    state.settings = {
      ...defaultSettings,
      ...(parsed.settings || {})
    };


    state.cutoffs.forEach(c => {
      c.records = Array.isArray(c.records) ?
        c.records : [];


      c.dailyRate = Number(
        c.dailyRate ?? state.settings.dailyRate
      );


      c.dailyHours = Number(
        c.dailyHours ?? state.settings.dailyHours
      );


      c.otPremium = Number(
        c.otPremium ?? state.settings.otPremium
      );


      c.nightPremium = Number(
        c.nightPremium ?? state.settings.nightPremium
      );


      c.records.forEach(r => {
        r.officialStartTime = r.officialStartTime || state.settings.officialStartTime;
        r.rateOverride = r.rateOverride == null ?
          null : Number(r.rateOverride);


        r.isActive = Boolean(r.isActive);


        calculateRecord(r, c);
      });
    });


    if (!state.cutoffs.some(c =>
      c.id === state.selectedCutoffId
    )) {
      state.selectedCutoffId =
        state.cutoffs[0]?.id || null;
    }


  } catch (error) {
    console.error(error);
    notify("Saved data could not be loaded.", "error");
  }
}


/* ==========================================
   4. PAYROLL RATE CALCULATIONS
========================================== */


/*
  Hourly Rate = Daily Rate / Paid Duty Hours


  Regular Pay = Regular Hours * Hourly Rate


  OT Pay = OT Hours * Hourly Rate * 1.25


  Night Differential =
  Eligible Night Hours * Hourly Rate * 0.10
*/


function getRates(cutoff, record = null) {
  const daily = record?.rateOverride != null ?
    Number(record.rateOverride) :
    Number(cutoff.dailyRate);


  const hours = Number(cutoff.dailyHours) || 8;
  const hourly = daily / hours;


  return {
    daily,
    hours,
    hourly,
    otHourly: hourly *
      (1 + Number(cutoff.otPremium) / 100),


    nightHourly: hourly *
      (1 + Number(cutoff.nightPremium) / 100)
  };
}


function getLateMinutes(timeIn, officialStartTime = state.settings.officialStartTime) {
  if (!timeIn || !officialStartTime) return 0;

  const [timeInHours, timeInMinutes] = timeIn.split(":").map(Number);
  const [startHours, startMinutes] = officialStartTime.split(":").map(Number);
  const actualMinutes = timeInHours * 60 + timeInMinutes;
  const scheduledMinutes = startHours * 60 + startMinutes;

  if (!Number.isFinite(actualMinutes) || !Number.isFinite(scheduledMinutes)) {
    return 0;
  }

  const minutesLate = actualMinutes - scheduledMinutes;
  return minutesLate > 0 ? Math.ceil(minutesLate / 30) * 30 : 0;
}


/* ==========================================
   5. SHIFT CALCULATIONS
========================================== */


function timestamp(date, time) {
  return new Date(
    date + "T" + time + ":00"
  ).getTime();
}


/*
  Night Differential:
  10:00 PM to 6:00 AM.


  The shift is divided into one-minute
  segments to identify eligible hours.
*/


function getShiftSegments(date, timeIn, timeOut) {
  const start = timestamp(date, timeIn);
  let end = timestamp(date, timeOut);


  if (!Number.isFinite(start) ||
      !Number.isFinite(end)) {
    return [];
  }


  // Overnight shift.
  if (end <= start) {
    end += 86400000;
  }


  // Prevent shifts exceeding 24 hours.
  if (end - start > 86400000) {
    return [];
  }


  const segments = [];
  const minute = 60000;


  for (
    let cursor = start;
    cursor < end;
    cursor += minute
  ) {
    const next = Math.min(cursor + minute, end);
    const midpoint = new Date((cursor + next) / 2);
    const hour = midpoint.getHours();


    segments.push({
      hours: (next - cursor) / 3600000,
      isNight: hour >= 22 || hour < 6
    });
  }


  return segments;
}


/* ==========================================
   6. UNPAID BREAK DEDUCTION
========================================== */


/*
  When enabled, one hour is deducted
  from the end of the shift.


  This is an estimate because exact break
  start and end times aren't recorded.
*/


function getPaidSegments(segments, breakHours) {
  let remaining = breakHours;
  const result = [];


  for (let i = segments.length - 1; i >= 0; i--) {
    const segment = segments[i];


    const removed = Math.min(
      segment.hours,
      remaining
    );


    remaining -= removed;


    const paid = segment.hours - removed;


    if (paid > 0) {
      result.unshift({
        ...segment,
        hours: paid
      });
    }
  }


  return result;
}


/* ==========================================
   7. COMPLETE ATTENDANCE CALCULATION
========================================== */


function calculateRecord(record, cutoff) {
  const officialStartTime = record.officialStartTime || state.settings.officialStartTime;
  const lateMinutes = getLateMinutes(record.timeIn, officialStartTime);
  const rates = getRates(cutoff, record);

  if (!record.date ||
      !record.timeIn ||
      !record.timeOut) {


    Object.assign(record, {
      grossHours: 0,
      breakDeduction: 0,
      hours: 0,
      regularHours: 0,
      otHours: 0,
      nightHours: 0,
      lateMinutes,
      lateDeduction: 0,
      grossIncome: 0,
      regularPay: 0,
      otPay: 0,
      nightPay: 0,
      income: 0
    });


    return record;
  }


  const segments = getShiftSegments(
    record.date,
    record.timeIn,
    record.timeOut
  );


  const grossHours = segments.reduce(
    (sum, s) => sum + s.hours, 0
  );


  const breakDeduction =
    state.settings.withBreakTime ? 1 : 0;


  const paidSegments = getPaidSegments(
    segments,
    breakDeduction
  );


  const totalPaid = paidSegments.reduce(
    (sum, s) => sum + s.hours, 0
  );


  let regularHours = 0;
  let otHours = 0;
  let nightHours = 0;


  let regularPay = 0;
  let otPay = 0;
  let nightPay = 0;


  let remainingRegular = rates.hours;


  for (const segment of paidSegments) {


    const regular = Math.min(
      segment.hours,
      remainingRegular
    );


    const excess = segment.hours - regular;


    remainingRegular -= regular;


    regularHours += regular;
    otHours += excess;


    regularPay += regular * rates.hourly;


    otPay += excess *
      rates.hourly *
      (1 + Number(cutoff.otPremium) / 100);


    if (segment.isNight) {
      nightHours += segment.hours;


      nightPay += segment.hours *
        rates.hourly *
        Number(cutoff.nightPremium) / 100;
    }
  }


  const grossIncome = regularPay + otPay + nightPay;
  const lateDeduction = rates.hourly * lateMinutes / 60;


  Object.assign(record, {
    grossHours: Number(grossHours.toFixed(4)),
    breakDeduction,
    hours: Number(totalPaid.toFixed(4)),
    regularHours: Number(regularHours.toFixed(4)),
    otHours: Number(otHours.toFixed(4)),
    nightHours: Number(nightHours.toFixed(4)),
    lateMinutes,
    lateDeduction,
    grossIncome,
    regularPay,
    otPay,
    nightPay,
    income: grossIncome - lateDeduction
  });


  return record;
}


/* ==========================================
   8. PAYROLL SUMMARY
========================================== */


function summarize(cutoff) {
  return cutoff.records
    .filter(r => r.timeIn && r.timeOut)
    .reduce((s, r) => {


      calculateRecord(r, cutoff);


      s.days++;
      s.hours += r.hours;
      s.otHours += r.otHours;
      s.nightHours += r.nightHours;


      s.regularPay += r.regularPay;
      s.otPay += r.otPay;
      s.nightPay += r.nightPay;
      s.lateDeduction += r.lateDeduction;
      s.income += r.income;


      return s;


    }, {
      days: 0,
      hours: 0,
      otHours: 0,
      nightHours: 0,
      regularPay: 0,
      otPay: 0,
      nightPay: 0,
      lateDeduction: 0,
      income: 0
    });
}

// ==========================================
// 9. DASHBOARD RENDERING
// ==========================================

function renderDashboard() {
  const cutoff = getCurrentCutoff();

  $("dashboard").style.display = cutoff ? "block" : "none";
  $("welcomeScreen").style.display = cutoff ? "none" : "block";

  if (!cutoff) {
    $("dashboardTitle").textContent = "Welcome to DTR & Payroll";
    renderCutoffList();
    return;
  }

  $("dashboardTitle").textContent = cutoff.name;

  const summary = summarize(cutoff);
  const rates = getRates(cutoff);

  $("daysWorked").textContent = summary.days;
  $("totalHours").textContent = summary.hours.toFixed(2);
  $("totalOT").textContent = summary.otHours.toFixed(2);
  $("estimatedIncome").textContent = money(summary.income);

  $("regularPay").textContent = money(summary.regularPay);
  $("otPay").textContent = money(summary.otPay);
  $("nightPay").textContent = money(summary.nightPay);
  $("lateDeduction").textContent = money(summary.lateDeduction);

  $("infoDaily").textContent = money(rates.daily);
  $("infoHourly").textContent = money(rates.hourly);
  $("infoOT").textContent = money(rates.otHourly);
  $("infoNight").textContent = money(rates.hourly * (1 + cutoff.nightPremium / 100));

  renderAttendanceTable();
  updateAttendanceButtons();
  renderCutoffList();

  saveState();
}

// ==========================================
// 10. CUTOFF SIDEBAR
// ==========================================

function renderCutoffList() {
  const search = ($("cutoffSearch").value || "").toLowerCase();

  const filtered = state.cutoffs.filter(c =>
    c.name.toLowerCase().includes(search)
  );

  $("cutoffList").innerHTML = filtered.length
    ? filtered.map(c => `
      <div class="cutoff-item ${c.id === state.selectedCutoffId ? "active" : ""}"
           data-id="${escapeHTML(c.id)}">
        <div class="cutoff-name">${escapeHTML(c.name)}</div>
        <div class="cutoff-dates">
          ${formatDate(c.startDate)} – ${formatDate(c.endDate)}
        </div>
      </div>
    `).join("")
    : `<div class="empty-state">No cut-offs found.</div>`;

  $("cutoffList").querySelectorAll(".cutoff-item").forEach(item => {
    item.addEventListener("click", () => {
      selectCutoff(item.dataset.id);
    });
  });
}

function selectCutoff(id) {
  const cutoff = state.cutoffs.find(c => c.id === id);
  if (!cutoff) return;

  state.selectedCutoffId = id;
  saveState();
  renderDashboard();
  closeDrawer();
}

// ==========================================
// 11. ATTENDANCE TABLE
// ==========================================

function renderAttendanceTable() {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  const records = [...cutoff.records];

  const sort = $("sortBy").value;

  records.sort((a, b) => {
    switch (sort) {
      case "date-asc":
        return a.date.localeCompare(b.date);
      case "income-desc":
        return b.income - a.income;
      case "income-asc":
        return a.income - b.income;
      case "hours-desc":
        return b.hours - a.hours;
      case "hours-asc":
        return a.hours - b.hours;
      case "ot-desc":
        return b.otHours - a.otHours;
      case "ot-asc":
        return a.otHours - b.otHours;
      default:
        return b.date.localeCompare(a.date);
    }
  });

  $("recordCount").textContent =
    `${records.length} record${records.length === 1 ? "" : "s"}`;

  $("emptyState").style.display = records.length ? "none" : "block";

  $("attendanceBody").innerHTML = records.map(r => {
    calculateRecord(r, cutoff);

    return `
      <tr>
        <td>${formatDate(r.date)}</td>
        <td>${escapeHTML(r.timeIn || "—")}</td>
        <td>${escapeHTML(r.timeOut || "—")}</td>
        <td>${Number(r.hours || 0).toFixed(2)}</td>
        <td class="red">${Number(r.otHours || 0).toFixed(2)}</td>
        <td class="red">${r.lateMinutes ? `${r.lateMinutes} min · ${money(r.lateDeduction)}` : "—"}</td>
        <td>${money(getRates(cutoff, r).daily)}</td>
        <td class="money">${money(r.regularPay)}</td>
        <td class="money">${money(r.otPay)}</td>
        <td class="money">${money(r.nightPay)}</td>
        <td class="money green">${money(r.income)}</td>
        <td>${escapeHTML(r.remarks || "—")}</td>
        <td>
          <div class="row-actions">
            <button class="btn btn-secondary btn-sm"
                    data-edit="${escapeHTML(r.id)}">Edit</button>
            <button class="btn btn-outline-danger btn-sm"
                    data-delete="${escapeHTML(r.id)}">Delete</button>
          </div>
        </td>
      </tr>
    `;
  }).join("");

  $("attendanceBody").querySelectorAll("[data-edit]").forEach(btn => {
    btn.addEventListener("click", () => editRecord(btn.dataset.edit));
  });

  $("attendanceBody").querySelectorAll("[data-delete]").forEach(btn => {
    btn.addEventListener("click", () => deleteRecord(btn.dataset.delete));
  });
}

// ==========================================
// 12. CLOCK AND ATTENDANCE BUTTONS
// ==========================================

function updateClock() {
  $("currentDateTime").textContent =
    new Date().toLocaleString("en-PH", {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit"
    });
}

function getActiveRecord(cutoff) {
  return cutoff.records.find(r => r.isActive) || null;
}

function updateAttendanceButtons() {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  const active = getActiveRecord(cutoff);

  $("timeInBtn").disabled = !!active;
  $("timeOutBtn").disabled = !active;

  const lateMinutes = active
    ? getLateMinutes(active.timeIn, active.officialStartTime || state.settings.officialStartTime)
    : 0;
  const estimatedLateDeduction = active
    ? getRates(cutoff, active).hourly * lateMinutes / 60
    : 0;

  $("attendanceStatus").textContent = active
    ? `Currently on duty since ${active.timeIn}. ${lateMinutes ? `Late by ${lateMinutes} min; estimated deduction ${money(estimatedLateDeduction)}.` : "On time."}`
    : "Ready to record attendance.";
}

// ==========================================
// 13. TIME IN
// ==========================================

function timeIn() {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  if (getActiveRecord(cutoff)) {
    notify("You already have an active Time In.", "error");
    return;
  }

  const now = new Date();
  const date = [
    now.getFullYear(),
    String(now.getMonth() + 1).padStart(2, "0"),
    String(now.getDate()).padStart(2, "0")
  ].join("-");

  const time = [
    String(now.getHours()).padStart(2, "0"),
    String(now.getMinutes()).padStart(2, "0")
  ].join(":");

  if (date < cutoff.startDate || date > cutoff.endDate) {
    notify("Today's date is outside this cut-off period.", "error");
    return;
  }

  const officialStartTime = state.settings.officialStartTime;
  const recordedTime = time < officialStartTime ? officialStartTime : time;

  const record = {
    id: uid(),
    date,
    timeIn: recordedTime,
    timeOut: "",
    remarks: "",
    officialStartTime,
    rateOverride: null,
    isActive: true
  };

  cutoff.records.push(record);

  saveState();
  renderDashboard();

  notify(recordedTime !== time
    ? "Early Time In recorded at the official start time. Edit the record to change it."
    : "Time In recorded successfully!");
}

// ==========================================
// 14. TIME OUT
// ==========================================

function timeOut() {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  const record = getActiveRecord(cutoff);

  if (!record) {
    notify("No active attendance found.", "error");
    return;
  }

  const now = new Date();

  const date = [
    now.getFullYear(),
    String(now.getMonth() + 1).padStart(2, "0"),
    String(now.getDate()).padStart(2, "0")
  ].join("-");

  const time = [
    String(now.getHours()).padStart(2, "0"),
    String(now.getMinutes()).padStart(2, "0")
  ].join(":");

  record.timeOut = time;
  record.isActive = false;

  calculateRecord(record, cutoff);

  saveState();
  renderDashboard();

  notify(`Time Out recorded! Income: ${money(record.income)}`);
}

// ==========================================
// 15. MANUAL ATTENDANCE ENTRY
// ==========================================

function openManualEntry() {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  const today = new Date();
  const todayString = [
    today.getFullYear(),
    String(today.getMonth() + 1).padStart(2, "0"),
    String(today.getDate()).padStart(2, "0")
  ].join("-");

  openModal("Add Manual Entry", `
    <div class="form-group">
      <label>Date</label>
      <input type="date" name="date"
        value="${todayString}"
        min="${cutoff.startDate}"
        max="${cutoff.endDate}" required>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label>Time In</label>
        <input type="time" name="timeIn" required>
      </div>

      <div class="form-group">
        <label>Time Out</label>
        <input type="time" name="timeOut" required>
      </div>
    </div>

    <div class="form-group">
      <label>Remarks (Optional)</label>
      <textarea name="remarks"
        placeholder="Add remarks..."></textarea>
    </div>
  `, "Save Entry", data => {

    if (data.date < cutoff.startDate ||
        data.date > cutoff.endDate) {
      notify("Date must be within the cut-off period.", "error");
      return false;
    }

    const record = {
      id: uid(),
      date: data.date,
      timeIn: data.timeIn,
      timeOut: data.timeOut,
      remarks: data.remarks,
      officialStartTime: state.settings.officialStartTime,
      rateOverride: null,
      isActive: false
    };

    calculateRecord(record, cutoff);

    if (record.grossHours <= 0) {
      notify("Invalid attendance times.", "error");
      return false;
    }

    cutoff.records.push(record);

    saveState();
    renderDashboard();

    notify("Manual attendance added!");
  });
}

// ==========================================
// 16. EDIT ATTENDANCE
// ==========================================

function editRecord(id) {
  const cutoff = getCurrentCutoff();
  const record = cutoff.records.find(r => r.id === id);

  if (!record) return;

  openModal("Edit Attendance", `
    <div class="form-group">
      <label>Date</label>
      <input type="date" name="date"
        value="${escapeHTML(record.date)}"
        min="${cutoff.startDate}"
        max="${cutoff.endDate}" required>
    </div>

    <div class="form-grid">
      <div class="form-group">
        <label>Time In</label>
        <input type="time" name="timeIn"
          value="${escapeHTML(record.timeIn)}" required>
      </div>

      <div class="form-group">
        <label>Time Out</label>
        <input type="time" name="timeOut"
          value="${escapeHTML(record.timeOut)}" required>
      </div>
    </div>

    <div class="form-group">
      <label>Daily Rate Override (Optional)</label>
      <input type="number" name="rateOverride"
        min="0" step="0.01"
        value="${record.rateOverride ?? ""}"
        placeholder="Use default daily rate">
      <small class="helper">
        Leave empty to use the cut-off's default daily rate.
      </small>
    </div>

    <div class="form-group">
      <label>Remarks</label>
      <textarea name="remarks">${escapeHTML(record.remarks)}</textarea>
    </div>
  `, "Save Changes", data => {

    if (data.date < cutoff.startDate ||
        data.date > cutoff.endDate) {
      notify("Date must be within the cut-off period.", "error");
      return false;
    }

    if (data.timeOut <= data.timeIn) {
      notify("Check your attendance times.", "error");
      return false;
    }

    record.date = data.date;
    record.timeIn = data.timeIn;
    record.timeOut = data.timeOut;
    record.remarks = data.remarks;
    record.rateOverride =
      data.rateOverride === "" ? null : Number(data.rateOverride);

    record.isActive = false;

    calculateRecord(record, cutoff);

    saveState();
    renderDashboard();

    notify("Attendance updated!");
  });
}

// ==========================================
// 17. DELETE ATTENDANCE
// ==========================================

function deleteRecord(id) {
  const cutoff = getCurrentCutoff();
  if (!cutoff) return;

  const record = cutoff.records.find(r => r.id === id);
  if (!record) return;

  openModal("Delete Attendance", `
    <p>Are you sure you want to delete the attendance record for
    <strong>${formatDate(record.date)}</strong>?</p>
    <p class="helper" style="margin-top:10px">
      This action cannot be undone.
    </p>
  `, "Delete Record", () => {

    cutoff.records = cutoff.records.filter(r => r.id !== id);

    saveState();
    renderDashboard();

    notify("Attendance deleted.");
  }, true);
}

// ==========================================
// 18. MOBILE DRAWER
// ==========================================

function openDrawer() {
  $("sidebar").classList.add("open");
  $("overlay").classList.add("show");
}

function closeDrawer() {
  $("sidebar").classList.remove("open");
  $("overlay").classList.remove("show");
}

// ==========================================
// 19. MODAL SYSTEM
// ==========================================

function openModal(title, content, buttonText, callback, danger = false) {
  $("modalTitle").textContent = title;
  $("modalBody").innerHTML = content;

  $("modalFooter").innerHTML = `
    <button type="button" class="btn btn-secondary"
      id="modalCancel">Cancel</button>

    <button type="submit"
      class="btn ${danger ? "btn-danger" : "btn-primary"}">
      ${buttonText}
    </button>
  `;

  modalCallback = callback;

  $("modalBackdrop").classList.add("open");

  $("modalCancel").onclick = closeModal;
}

function closeModal() {
  $("modalBackdrop").classList.remove("open");
  modalCallback = null;
}

$("modalClose").addEventListener("click", closeModal);

$("modalBackdrop").addEventListener("click", e => {
  if (e.target === $("modalBackdrop")) closeModal();
});

// ==========================================
// 20. MODAL FORM SUBMISSION
// ==========================================

$("modalForm").addEventListener("submit", e => {
  e.preventDefault();

  if (!modalCallback) return;

  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData.entries());

  const result = modalCallback(data);

  if (result === false) return;

  closeModal();
});

// ==========================================
// 21. CREATE NEW CUT-OFF
// ==========================================

function createCutoff() {
  const period = generateCutoffPeriod();

  openModal("Create New Cut-Off", `
    <div class="form-group">
      <label>Cut-Off Name</label>

      <input type="text" name="name"
        value="${escapeHTML(period.name)}" required>
    </div>

    <div class="rate-preview">
      <small>Automatically generated period</small>
      <strong>${formatDate(period.startDate)} – ${formatDate(period.endDate)}</strong>
    </div>

    <p class="helper">
      The cut-off dates are automatically generated based
      on today's date. You can customize the cut-off name.
    </p>
  `, "Create Cut-Off", data => {

    const cutoff = {
      id: uid(),
      name: data.name.trim(),
      startDate: period.startDate,
      endDate: period.endDate,

      dailyRate: Number(state.settings.dailyRate),
      dailyHours: Number(state.settings.dailyHours),
      otPremium: Number(state.settings.otPremium),
      nightPremium: Number(state.settings.nightPremium),

      records: []
    };

    if (!cutoff.name) {
      notify("Please enter a cut-off name.", "error");
      return false;
    }

    if (state.cutoffs.some(c =>
      c.startDate === cutoff.startDate &&
      c.endDate === cutoff.endDate
    )) {
      notify("This cut-off period already exists.", "error");
      return false;
    }

    state.cutoffs.unshift(cutoff);
    state.selectedCutoffId = cutoff.id;

    saveState();
    renderDashboard();

    notify("New cut-off created!");
  });
}

// ==========================================
// 22. SETTINGS MODAL
// ==========================================

function openSettings() {
  const settings = state.settings;

  openModal("Payroll Settings", `

    <div class="form-group">
      <label>Official Start Time</label>
      <input type="time" name="officialStartTime"
        value="${escapeHTML(settings.officialStartTime)}" required>
      <small class="helper">
        Early clock-ins are recorded at this start time. After the start, each started 30-minute late block is deducted at your hourly rate (for example, 6:01 AM = 30 minutes). Edit the attendance record to change its time. This schedule applies to new records.
      </small>
    </div>

    <div class="form-group">
      <label>Default Daily Rate (₱)</label>

      <input type="number" name="dailyRate"
        min="0" step="0.01"
        value="${settings.dailyRate}" required>
    </div>

    <div class="form-group">
      <label>Paid Duty Hours</label>

      <input type="number" name="dailyHours"
        min="0.01" max="24" step="0.01"
        value="${settings.dailyHours}" required>

      <small class="helper">
        Example: 8 paid hours or 7.5 paid hours.
        Your hourly rate is calculated by dividing
        your daily rate by these hours.
      </small>
    </div>

    <div class="rate-preview" id="settingsRatePreview">
      <small>Calculated Rates</small>

      <div class="rate-preview-grid">

        <div>
          <small>Hourly Rate</small>
          <strong id="previewHourly">₱0.00</strong>
        </div>

        <div>
          <small>OT Rate (+25%)</small>
          <strong id="previewOT">₱0.00</strong>
        </div>

        <div>
          <small>Night Rate (+10%)</small>
          <strong id="previewNight">₱0.00</strong>
        </div>

        <div>
          <small>Daily Rate</small>
          <strong id="previewDaily">₱0.00</strong>
        </div>

      </div>
    </div>

    <div class="form-grid">

      <div class="form-group">
        <label>Overtime Premium (%)</label>

        <input type="number" name="otPremium"
          min="0" max="500" step="1"
          value="${settings.otPremium}" required>
      </div>

      <div class="form-group">
        <label>Night Differential (%)</label>

        <input type="number" name="nightPremium"
          min="0" max="500" step="1"
          value="${settings.nightPremium}" required>
      </div>

    </div>

    <div class="form-group">
      <label>Currency Symbol</label>

      <input type="text" name="currency"
        maxlength="5"
        value="${escapeHTML(settings.currency)}"
        required>
    </div>

    <div class="rate-preview">

      <div style="display:flex;justify-content:space-between;align-items:center;gap:12px">

        <div>
          <strong>With Break Time</strong>

          <p class="helper" style="margin-top:5px">
            Automatically deduct 1 hour from total duty.
          </p>
        </div>

        <label class="switch">
          <input type="checkbox" name="withBreakTime"
            ${settings.withBreakTime ? "checked" : ""}>
          <span></span>
        </label>

      </div>

    </div>

    <p class="helper">
      Overtime is automatically calculated after your
      configured paid duty hours. No separate overtime
      activation is required.
    </p>

  `, "Save Settings", data => {

    const dailyRate = Number(data.dailyRate);
    const dailyHours = Number(data.dailyHours);
    const officialStartTime = data.officialStartTime;
    const otPremium = Number(data.otPremium);
    const nightPremium = Number(data.nightPremium);

    if (
      !Number.isFinite(dailyRate) || dailyRate < 0 ||
      !Number.isFinite(dailyHours) || dailyHours <= 0 ||
      dailyHours > 24 ||
      !/^([01][0-9]|2[0-3]):[0-5][0-9]$/.test(officialStartTime) ||
      !Number.isFinite(otPremium) || otPremium < 0 ||
      !Number.isFinite(nightPremium) || nightPremium < 0 ||
      !data.currency.trim()
    ) {
      notify("Please check your settings.", "error");
      return false;
    }

    state.settings = {
      ...state.settings,
      dailyRate,
      dailyHours,
      officialStartTime,
      otPremium,
      nightPremium,
      currency: data.currency.trim(),
      withBreakTime: data.withBreakTime === "on"
    };

    // New attendance records keep the official start time used when they were entered.
    // Existing cut-off rates remain unchanged.
    saveState();
    renderDashboard();

    notify("Settings saved successfully!");
  });

  // Live rate preview.
  const updatePreview = () => {
    const form = $("modalForm");

    const daily = Number(form.elements.dailyRate.value) || 0;
    const hours = Number(form.elements.dailyHours.value) || 1;
    const ot = Number(form.elements.otPremium.value) || 0;
    const night = Number(form.elements.nightPremium.value) || 0;
    const currency = form.elements.currency.value || "₱";

    const hourly = daily / hours;

    const format = value => currency +
      value.toLocaleString("en-PH", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });

    $("previewDaily").textContent = format(daily);
    $("previewHourly").textContent = format(hourly);
    $("previewOT").textContent = format(hourly * (1 + ot / 100));
    $("previewNight").textContent = format(hourly * (1 + night / 100));
  };

  ["dailyRate", "dailyHours", "otPremium",
   "nightPremium", "currency"].forEach(name => {
    $("modalForm").elements[name].addEventListener(
      "input", updatePreview
    );
  });

  updatePreview();
}

// ==========================================
// 23. DARK MODE
// ==========================================

function applyTheme() {
  document.documentElement.dataset.theme =
    state.settings.theme === "dark" ? "dark" : "light";

  $("themeBtn").textContent =
    state.settings.theme === "dark" ? "☀ Light" : "☾ Dark";
}

function toggleTheme() {
  state.settings.theme =
    state.settings.theme === "dark" ? "light" : "dark";

  applyTheme();
  saveState();
}

// ==========================================
// 24. BUTTON EVENT CONNECTIONS
// ==========================================

$("newCutoffBtn").addEventListener("click", createCutoff);

$("welcomeCreateBtn").addEventListener("click", createCutoff);

$("settingsBtn").addEventListener("click", openSettings);

$("themeBtn").addEventListener("click", toggleTheme);

$("timeInBtn").addEventListener("click", timeIn);

$("timeOutBtn").addEventListener("click", timeOut);

$("manualBtn").addEventListener("click", openManualEntry);

$("cutoffSearch").addEventListener("input", renderCutoffList);

$("sortBy").addEventListener("change", renderAttendanceTable);

$("menuBtn").addEventListener("click", openDrawer);

$("overlay").addEventListener("click", closeDrawer);

// ==========================================
// 25. CSV EXPORT
// ==========================================

function exportCSV() {
  const cutoff = getCurrentCutoff();

  if (!cutoff) {
    notify("Select a cut-off first.", "error");
    return;
  }

  const headers = [
    "Date",
    "Time In",
    "Time Out",
    "Hours",
    "OT Hours",
    "Late Minutes",
    "Late Deduction",
    "Net Income",
    "Remarks"
  ];

  const rows = cutoff.records
    .filter(r => r.timeIn && r.timeOut)
    .map(r => {
      calculateRecord(r, cutoff);

      return [
        r.date,
        r.timeIn,
        r.timeOut,
        r.hours.toFixed(2),
        r.otHours.toFixed(2),
        r.lateMinutes,
        r.lateDeduction.toFixed(2),
        r.income.toFixed(2),
        r.remarks || ""
      ];
    });

  const escapeCSV = value =>
    '"' + String(value ?? "").replace(/"/g, '""') + '"';

  const csv = [
    headers.map(escapeCSV).join(","),
    ...rows.map(row => row.map(escapeCSV).join(","))
  ].join("\r\n");

  downloadFile(
    "\uFEFF" + csv,
    `DTR_${cutoff.name.replace(/[^a-z0-9]/gi, "_")}.csv`,
    "text/csv;charset=utf-8;"
  );

  notify("CSV exported successfully!");
}

// ==========================================
// 26. JSON BACKUP
// ==========================================

function backupData() {
  saveState();

  const backup = {
    application: "DTR & Payroll Tracker",
    version: 7,
    backupDate: new Date().toISOString(),
    data: state
  };

  const json = JSON.stringify(backup, null, 2);

  downloadFile(
    json,
    "DTR_Backup_" +
      new Date().toISOString().slice(0, 10) +
      ".json",
    "application/json"
  );

  notify("Backup downloaded successfully!");
}

// ==========================================
// 27. RESTORE JSON BACKUP
// ==========================================

function restoreData() {
  $("restoreInput").click();
}

$("restoreInput").addEventListener("change", async e => {
  const file = e.target.files[0];

  if (!file) return;

  try {
    const text = await file.text();
    const backup = JSON.parse(text);

    const imported = backup.data || backup;

    if (!Array.isArray(imported.cutoffs) ||
        !imported.settings) {
      throw new Error("Invalid backup structure.");
    }

    const confirmed = confirm(
      "Restore this backup?\n\n" +
      "Your current application data will be replaced."
    );

    if (!confirmed) {
      e.target.value = "";
      return;
    }

    state = {
      cutoffs: imported.cutoffs,
      selectedCutoffId: imported.selectedCutoffId || null,
      settings: {
        ...defaultSettings,
        ...imported.settings
      }
    };

    // Validate and recalculate imported records.
    state.cutoffs.forEach(c => {
      c.records = Array.isArray(c.records) ? c.records : [];

      c.records.forEach(r => {
        if (!r.id) r.id = uid();

        r.officialStartTime = r.officialStartTime || state.settings.officialStartTime;
        r.rateOverride =
          r.rateOverride == null ? null : Number(r.rateOverride);

        r.isActive = Boolean(r.isActive);

        calculateRecord(r, c);
      });
    });

    if (!state.cutoffs.some(c =>
      c.id === state.selectedCutoffId
    )) {
      state.selectedCutoffId =
        state.cutoffs[0]?.id || null;
    }

    saveState();
    applyTheme();
    renderDashboard();

    notify("Backup restored successfully!");

  } catch (error) {
    console.error(error);
    notify("Invalid or damaged backup file.", "error");
  }

  e.target.value = "";
});

// ==========================================
// 28. DOWNLOAD HELPER
// ==========================================

function downloadFile(content, filename, type) {
  const blob = new Blob([content], { type });
  const url = URL.createObjectURL(blob);

  const link = document.createElement("a");

  link.href = url;
  link.download = filename;

  document.body.appendChild(link);
  link.click();
  link.remove();

  setTimeout(() => URL.revokeObjectURL(url), 1000);
}

// ==========================================
// 29. BUTTON CONNECTIONS
// ==========================================

$("exportCsvBtn").addEventListener("click", exportCSV);

$("backupBtn").addEventListener("click", backupData);

$("restoreBtn").addEventListener("click", restoreData);

// ==========================================
// 30. APPLICATION INITIALIZATION
// ==========================================

function initializeApp() {

  // Load previously saved information.
  loadState();

  // Restore selected theme.
  applyTheme();

  // Render the application.
  renderDashboard();

  // Start the live date and time display.
  updateClock();

  setInterval(updateClock, 1000);

  // Keep the interface synchronized.
  saveState();

  console.log("DTR & Payroll Tracker initialized.");
}

// ==========================================
// 31. START APPLICATION
// ==========================================

document.addEventListener(
  "DOMContentLoaded",
  initializeApp
);

</script>


</body>
</html>
