<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Surat Keluar - SMA IT Puri Abu Hurairah</title>
    <style>
        /* --- VARIABEL & RESET --- */
        :root {
            --primary-color: #2c3e50;
            --primary-light: #34495e;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --teal-color: #16a085;
            --word-color: #2b579a;
            --pdf-color: #c0392b;
            
            --bg-color: #f4f6f9;
            --card-bg: #ffffff;
            --text-color: #2c3e50;
            --border-color: #e1e4e8;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.15);
            --radius: 8px;
            --transition: all 0.3s ease;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        
        body { 
            background-color: var(--bg-color); 
            color: var(--text-color); 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh;
        }

        /* --- ANIMATIONS --- */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideUp { from { transform: translateY(0); } to { transform: translateY(-100%); } }

        /* --- LANDING PAGE --- */
        #landingPage {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, #1a252f 0%, #2c3e50 100%);
            z-index: 9999; display: flex; justify-content: center; align-items: center;
            transition: transform 0.8s cubic-bezier(0.7, 0, 0.3, 1);
        }
        #landingPage.slideUp { transform: translateY(-100%); }
        
        .landing-content {
            text-align: center; color: white; max-width: 600px; padding: 3rem 2rem;
            background: rgba(255,255,255,0.08); backdrop-filter: blur(12px);
            border-radius: 24px; border: 1px solid rgba(255,255,255,0.15);
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.8s ease-out;
        }
        .landing-logo { 
            width: 120px; height: 120px; background: white; border-radius: 50%; 
            margin: 0 auto 25px; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
        }
        .landing-logo img { width: 70%; height: 70%; object-fit: contain; }
        .landing-title { font-size: 2.2rem; margin-bottom: 10px; font-weight: 700; letter-spacing: -0.5px; }
        .landing-subtitle { font-size: 1.1rem; margin-bottom: 40px; opacity: 0.9; font-weight: 300; }
        
        .btn-start {
            padding: 16px 48px; font-size: 1.1rem; background: var(--success-color); 
            border: none; color: white; border-radius: 50px; cursor: pointer; 
            box-shadow: 0 10px 25px rgba(39, 174, 96, 0.5); transition: var(--transition);
            font-weight: 600; letter-spacing: 0.5px;
        }
        .btn-start:hover { transform: translateY(-3px) scale(1.02); box-shadow: 0 15px 30px rgba(39, 174, 96, 0.6); }

        /* --- HEADER WEB --- */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 0;
            z-index: 100;
            flex-wrap: wrap;
            gap: 15px;
        }
        .logo-area { display: flex; align-items: center; gap: 15px; flex: 1; min-width: 280px; }
        
        .logo-box { 
            position: relative; width: 70px; height: 70px; background: white; border-radius: 8px; 
            display: flex; align-items: center; justify-content: center; overflow: hidden;
            cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: transform 0.2s;
        }
        .logo-box:hover { transform: scale(1.05); }
        .logo-box img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
        .logo-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center;
            opacity: 0; transition: opacity 0.2s; color: white; font-size: 20px; font-weight: bold;
        }
        .logo-box:hover .logo-overlay { opacity: 1; }
        .app-title h1 { font-size: 1.25rem; font-weight: 700; line-height: 1.2; }
        .app-title p { font-size: 0.75rem; font-weight: 500; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px; }
        
        .date-display { font-size: 0.85rem; background: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); white-space: nowrap; }

        /* --- STATS DASHBOARD (BARU) --- */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        .stat-card {
            background: var(--card-bg);
            padding: 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1.2;
        }
        .stat-label {
            font-size: 0.85rem;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }
        .stat-card.total .stat-value { color: var(--secondary-color); }
        .stat-card.month .stat-value { color: var(--success-color); }
        .stat-card.filter .stat-value { color: var(--warning-color); }

        /* --- CONTROLS & FILTER --- */
        main { padding: 2rem; flex: 1; max-width: 1400px; margin: 0 auto; width: 100%; animation: fadeIn 0.6s ease-out; }

        .controls { 
            display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 25px; 
            justify-content: space-between; align-items: flex-start; 
            background: var(--card-bg); padding: 20px; border-radius: var(--radius); 
            box-shadow: var(--shadow-sm); border: 1px solid var(--border-color);
        }

        .filter-group {
            display: flex; gap: 10px; flex-wrap: wrap; align-items: center; flex: 1; min-width: 300px;
        }
        
        /* Search & Date Filter Container */
        .search-wrapper {
            display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
            background: #f8f9fa; padding: 8px; border-radius: 8px; border: 1px solid var(--border-color); flex: 1;
        }

        .search-container {
            display: flex; align-items: center; background: white; border: 1px solid var(--border-color);
            border-radius: 6px; padding: 0 10px; flex: 1; min-width: 250px;
            transition: var(--transition);
        }
        .search-container:focus-within { border-color: var(--secondary-color); box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1); }
        .search-icon { color: #95a5a6; margin-right: 8px; font-size: 14px; }
        
        .search-select {
            background: transparent; border: none; color: var(--primary-color); font-size: 0.85rem;
            font-weight: 600; padding-right: 8px; border-right: 1px solid #eee;
            margin-right: 8px; cursor: pointer; outline: none; height: 30px;
        }
        .search-select option { color: #333; }
        
        .search-input {
            background: transparent; border: none; color: var(--text-color); font-size: 0.9rem;
            flex: 1; outline: none; height: 30px;
        }
        .search-input::placeholder { color: #ccc; }

        /* Date Selectors for Filter */
        .date-filter-select {
            padding: 6px 10px; border: 1px solid var(--border-color); border-radius: 6px;
            background: white; color: var(--text-color); font-size: 0.85rem; outline: none;
            cursor: pointer; min-width: 100px;
        }
        .date-filter-select:focus { border-color: var(--secondary-color); }

        .btn-group { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
        
        button { 
            padding: 10px 18px; border: none; border-radius: 6px; cursor: pointer; 
            font-size: 0.9rem; font-weight: 500; transition: var(--transition); 
            color: white; display: inline-flex; align-items: center; gap: 8px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        }
        button:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
        button:active { transform: translateY(0); }
        
        .btn-add { background-color: var(--secondary-color); }
        .btn-print { background-color: var(--success-color); }
        .btn-import { background-color: var(--teal-color); }
        .btn-backup { background-color: var(--warning-color); color: #fff; }
        .btn-restore { background-color: #8e44ad; }
        .btn-cancel { background-color: #95a5a6; }
        .btn-action { padding: 6px 12px; font-size: 0.75rem; margin-right: 4px; border-radius: 4px; }
        .btn-edit { background-color: var(--warning-color); }
        .btn-delete { background-color: var(--accent-color); }

        /* --- TABLE --- */
        .table-card { background: var(--card-bg); border-radius: var(--radius); box-shadow: var(--shadow-md); overflow: hidden; border: 1px solid var(--border-color); }
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 1000px; }
        th { background-color: #f8f9fa; color: var(--primary-color); padding: 15px 12px; text-align: left; font-weight: 600; font-size: 0.85rem; border-bottom: 2px solid var(--border-color); white-space: nowrap; text-transform: uppercase; }
        td { padding: 14px 12px; border-bottom: 1px solid var(--border-color); color: #555; font-size: 0.9rem; vertical-align: middle; }
        th:first-child, td:first-child { text-align: center; width: 50px; }
        th:last-child, td:last-child { text-align: center; width: 160px; }
        tr:hover td { background-color: #f1f7fc; transition: background 0.2s; }

        .file-badge { 
            display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 12px; 
            font-size: 0.75rem; font-weight: 600; cursor: pointer; margin-right: 4px; margin-bottom: 4px; 
            transition: all 0.2s; user-select: none;
        }
        .file-badge:hover { transform: translateY(-1px); opacity: 0.85; }
        .file-badge.img { background-color: #e8f4fd; color: var(--secondary-color); border: 1px solid rgba(52, 152, 219, 0.2); }
        .file-badge.pdf { background-color: #fdedec; color: var(--pdf-color); border: 1px solid rgba(231, 76, 60, 0.2); }
        .file-badge.word { background-color: #eef2f7; color: var(--word-color); border: 1px solid rgba(43, 87, 154, 0.2); }

        /* --- KOP SURAT KHUSUS PRINT --- */
        .print-header-section {
            display: none;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px double #000;
        }
        .print-kop-img {
            width: 100%; max-height: 140px; object-fit: contain; object-position: top center;
            display: block; margin: 0 auto;
        }
        .print-report-title {
            font-size: 14pt; font-weight: bold; text-transform: uppercase;
            margin-top: 10px; margin-bottom: 5px; color: #000;
        }

        /* --- SIGNATURE (Print Only) --- */
        .signature-section { display: none; margin-top: 60px; margin-bottom: 40px; padding-right: 20px; }
        .sig-block { text-align: center; width: 250px; margin-left: auto; }
        .sig-space { height: 90px; }
        .sig-name { margin-top: 10px; font-weight: bold; color: var(--primary-color); font-size: 1rem; text-decoration: underline; }

        /* --- FOOTER KHUSUS PRINT --- */
        .doc-footer { 
            display: none; margin-top: auto; border-top: 2px solid var(--border-color); 
            padding: 10px 2rem; font-size: 0.8rem; color: #555; background: var(--card-bg);
            display: flex; justify-content: space-between; align-items: center;
        }

        /* --- MODAL --- */
        .modal-overlay { 
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(44, 62, 80, 0.8); backdrop-filter: blur(5px); 
            display: none; justify-content: center; align-items: center; z-index: 1000; 
            opacity: 0; transition: opacity 0.3s ease; 
        }
        .modal-overlay.open { display: flex; opacity: 1; }
        .modal-content { 
            background: var(--card-bg); padding: 2.5rem; border-radius: 16px; 
            width: 90%; max-width: 750px; max-height: 90vh; overflow-y: auto; 
            box-shadow: var(--shadow-lg); transform: scale(0.95); transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }
        .modal-overlay.open .modal-content { transform: scale(1); }
        .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid var(--border-color); padding-bottom: 15px; }
        .modal-header h2 { font-size: 1.5rem; color: var(--primary-color); display: flex; align-items: center; gap: 10px; }
        .close-modal { background: none; border: none; font-size: 32px; color: #999; cursor: pointer; padding: 0; box-shadow: none; line-height: 0.5; }
        .close-modal:hover { color: var(--accent-color); transform: rotate(90deg); }

        /* --- FORM --- */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 15px; }
        .full-width { grid-column: span 2; }
        .form-section-title { 
            grid-column: span 2; color: var(--secondary-color); font-size: 0.8rem; 
            text-transform: uppercase; letter-spacing: 1px; margin-top: 15px; font-weight: 700; 
            border-bottom: 1px dashed #ddd; padding-bottom: 5px; margin-bottom: 10px; 
        }
        .form-group { display: flex; flex-direction: column; }
        .form-group label { margin-bottom: 8px; font-weight: 600; font-size: 0.85rem; color: var(--primary-color); }
        
        .input-group-wrapper { display: flex; gap: 8px; align-items: stretch; }
        .form-control { 
            width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 8px; 
            font-size: 0.95rem; transition: border-color 0.2s; background: #fafafa; 
        }
        .form-control:focus { outline: none; border-color: var(--secondary-color); background: #fff; box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1); }
        
        .btn-sm-add { 
            background: var(--secondary-color); border: none; border-radius: 8px; 
            color: white; padding: 0 14px; cursor: pointer; font-size: 1.2rem; line-height: 1;
            display: flex; align-items: center; justify-content: center; min-width: 46px;
            flex-shrink: 0; transition: background 0.2s;
        }
        .btn-sm-add:hover { background: #2980b9; }
        .btn-sm-del { 
            background: var(--accent-color); border: none; border-radius: 8px; 
            color: white; padding: 0 14px; cursor: pointer; font-size: 1.2rem; line-height: 1;
            display: flex; align-items: center; justify-content: center; min-width: 46px;
            flex-shrink: 0; transition: background 0.2s;
        }
        .btn-sm-del:disabled { background: #bdc3c7; cursor: not-allowed; opacity: 0.6; }
        .btn-sm-del:not(:disabled):hover { background: #c0392b; }

        /* --- PREVIEW --- */
        #previewModal .modal-content { background: #2c3e50; color: white; max-width: 95vw; height: 90vh; display: flex; flex-direction: column; padding: 0; overflow: hidden; border: none; }
        .preview-header { padding: 15px 20px; background: rgba(0,0,0,0.3); display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .preview-header h3 { font-size: 1.1rem; }
        .preview-body { flex: 1; display: flex; justify-content: center; align-items: center; overflow: auto; padding: 20px; background: #1a1a1a; text-align: center; }
        .preview-body img { max-width: 100%; max-height: 100%; box-shadow: 0 0 20px rgba(0,0,0,0.5); border-radius: 4px; }
        .preview-body iframe { width: 100%; height: 100%; border: none; background: white; border-radius: 4px; }
        .doc-placeholder { background: white; color: #333; padding: 40px; border-radius: 8px; text-align: center; max-width: 400px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .doc-icon { font-size: 64px; color: #ddd; display: block; margin-bottom: 20px; }
        .btn-download { display: inline-block; margin-top: 20px; text-decoration: none; padding: 12px 24px; background: var(--word-color); color: white; border-radius: 6px; font-weight: bold; transition: background 0.2s; }
        .btn-download:hover { background: #1e427d; }

        /* --- TOAST --- */
        #toast { 
            visibility: hidden; min-width: 300px; background-color: #333; color: #fff; 
            text-align: center; border-radius: 50px; padding: 16px; position: fixed; 
            z-index: 2000; left: 50%; bottom: 30px; transform: translateX(-50%) translateY(20px); 
            box-shadow: 0 5px 15px rgba(0,0,0,0.3); font-weight: 500; opacity: 0; transition: all 0.3s; 
        }
        #toast.show { visibility: visible; transform: translateX(-50%) translateY(0); opacity: 1; }

        /* --- PRINT STYLES --- */
        @media print {
            @page { size: landscape; margin: 10mm; }
            #landingPage, .controls, .modal-overlay, .btn-action, .btn-sm-add, .btn-sm-del, 
            .search-container, .logo-overlay, header, .stats-container { display: none !important; }
            
            body { background: white; color: black; -webkit-print-color-adjust: exact; }
            
            .print-header-section { display: block !important; }
            main { padding: 0; margin: 0; width: 100%; max-width: 100%; animation: none; }
            .table-card { box-shadow: none; border: none; }
            table { border: 1px solid #000; width: 100%; font-size: 10pt; }
            th, td { border: 1px solid #000; padding: 8px; color: black; }
            th { background-color: #eee !important; color: black !important; -webkit-print-color-adjust: exact; }
            
            .file-badge { display: none; }
            .file-print-text { display: block; font-size: 9pt; color: #000; }
            
            .signature-section, .doc-footer { display: flex !important; }
            .doc-footer { border-top: 2px solid #000; padding-top: 10px; margin-top: 20px; font-size: 9pt; color: black; }
        }
        
        @media screen {
            .doc-footer, .print-header-section { display: none; }
        }
        .file-print-text { display: none; }
        
        @media (max-width: 900px) {
            header { flex-direction: column; align-items: stretch; }
            .search-wrapper { flex-direction: column; align-items: stretch; }
            .logo-area { justify-content: center; }
            .date-display { text-align: center; width: 100%; display: flex; justify-content: center; }
            .controls { flex-direction: column; align-items: stretch; }
            .btn-group { width: 100%; justify-content: space-between; }
            .form-grid { grid-template-columns: 1fr; }
            .full-width { grid-column: auto; }
        }
    </style>
</head>
<body>

    <!-- KOP SURAT KHUSUS PRINT -->
    <div class="print-header-section">
        <img src="kop.bmp" alt="Kop Surat" class="print-kop-img" onerror="this.style.display='none'; document.getElementById('kop-error').style.display='block'">
        <div id="kop-error" style="display:none; color:red; font-weight:bold;">[File kop.bmp tidak ditemukan]</div>
        <div class="print-report-title">LAPORAN SURAT KELUAR</div>
        <div id="printPeriodText" style="font-size:10pt; margin-top:5px;"></div>
    </div>

    <!-- LANDING PAGE -->
    <div id="landingPage">
        <div class="landing-content">
            <div class="landing-logo">
                <img src="logo.png" alt="Logo">
            </div>
            <h1 class="landing-title">SMA IT PURI ABU HURAIRAH</h1>
            <p class="landing-subtitle">Sistem Informasi Manajemen Surat Keluar</p>
            <button class="btn-start" onclick="enterApp()">Mulai Aplikasi</button>
        </div>
    </div>

    <!-- Header (Web View) -->
    <header>
        <div class="logo-area">
            <div class="logo-box" onclick="document.getElementById('logoInput').click()" title="Klik untuk ganti logo">
                <img id="appLogo" src="logo.png" alt="Logo Sekolah">
                <div class="logo-overlay">✎</div>
            </div>
            <input type="file" id="logoInput" accept="image/*" style="display: none;" onchange="handleLogoUpload(this)">
            <div class="app-title">
                <h1>SMA IT PURI ABU HURAIRAH MATARAM</h1>
                <p>APLIKASI SURAT KELUAR</p>
            </div>
        </div>
        <div class="date-display">
            <span id="currentDate">Memuat Tanggal...</span>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- DASHBOARD STATISTIK (BARU) -->
        <div class="stats-container">
            <div class="stat-card total">
                <div class="stat-value" id="statTotal">0</div>
                <div class="stat-label">Total Data Surat</div>
            </div>
            <div class="stat-card month">
                <div class="stat-value" id="statThisMonth">0</div>
                <div class="stat-label">Data Bulan Ini</div>
            </div>
            <div class="stat-card filter">
                <div class="stat-value" id="statFiltered">0</div>
                <div class="stat-label">Data Tampil (Filter)</div>
            </div>
        </div>

        <div class="controls">
            <!-- Filter & Search Area -->
            <div class="filter-group">
                <div class="search-wrapper">
                    <!-- Filter Bulan & Tahun -->
                    <select id="filterMonth" class="date-filter-select" onchange="handleFilterChange()">
                        <option value="">-- Semua Bulan --</option>
                        <!-- Opsi bulan diisi via JS -->
                    </select>
                    <select id="filterYear" class="date-filter-select" onchange="handleFilterChange()">
                        <!-- Opsi tahun diisi via JS -->
                    </select>

                    <!-- Search Text -->
                    <div class="search-container">
                        <span class="search-icon">🔍</span>
                        <select id="searchType" class="search-select" onchange="updateSearchPlaceholder()">
                            <option value="jenis">Jenis Surat</option>
                            <option value="tujuan">Tujuan Surat</option>
                        </select>
                        <input type="text" id="searchInput" class="search-input" placeholder="Cari jenis surat..." list="searchSuggestions" oninput="handleSearch()">
                        <datalist id="searchSuggestions"></datalist>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="btn-group">
                <button class="btn-add" onclick="openModal()">+ Buat Surat Baru</button>
                <button class="btn-print" onclick="window.print()">🖨️ Cetak Laporan</button>
                <input type="file" id="importInput" style="display: none;" onchange="importData(this)" accept=".json">
                <button class="btn-import" onclick="document.getElementById('importInput').click()">📥 Import</button>
                <button class="btn-backup" onclick="backupData()">💾 Backup</button>
                <button class="btn-restore" onclick="document.getElementById('restoreInput').click()">🔄 Restore</button>
                <input type="file" id="restoreInput" style="display: none;" onchange="restoreData(this)" accept=".json">
            </div>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table id="mailTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th>Jenis Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Perihal</th>
                            <th>Lampiran</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                        ?>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be rendered here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="signature-section">
            <div class="sig-block">
                <div class="sig-location">Mataram, <span id="sigDate"></span></div>
                <div style="height: 5px;"></div>
                <div class="sig-title">Kepala Sekolah</div>
                <div class="sig-space"></div>
                <div class="sig-name">Gunawan Trianto, M.Pd</div>
                <div class="sig-nip" style="font-size:0.85rem; margin-top:5px;">NIP. 19800101 200501 1 001</div>
            </div>
        </div>
    </main>

    <footer class="doc-footer">
        <div>PAH-KSP-FORM-22-06</div>
        <div>Rev. 01/10 September 2025</div>
        <div>Hal. 1 dari 1</div>
    </footer>

    <!-- INPUT SURAT MODAL -->
    <div id="inputModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">📝 Formulir Surat Keluar</h2>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            <form id="mailForm" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="editIndex" value="-1">
                <div class="form-grid">
                    <div class="form-section-title">Informasi Surat</div>
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input type="text" id="nomorSurat" class="form-control" required placeholder="Contoh: 421/102/SMAIT/2023">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" id="tanggalSurat" class="form-control" required>
                    </div>

                    <div class="form-section-title">Detail Surat Keluar</div>
                    <div class="form-group">
                        <label>Jenis Surat</label>
                        <div class="input-group-wrapper">
                            <select id="jenisSurat" class="form-control" required onchange="updateDeleteBtnState('jenis')">
                                <option value="">-- Pilih Jenis --</option>
                            </select>
                            <button type="button" class="btn-sm-add" title="Tambah Jenis Baru" onclick="openAddOptionModal('jenis')">+</button>
                            <button type="button" class="btn-sm-del" id="btnDelJenis" title="Hapus Jenis Terpilih" onclick="deleteOption('jenis')" disabled>-</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Surat</label>
                        <div class="input-group-wrapper">
                            <select id="tujuanSurat" class="form-control" required onchange="updateDeleteBtnState('tujuan')">
                                <option value="">-- Pilih Tujuan --</option>
                            </select>
                            <button type="button" class="btn-sm-add" title="Tambah Tujuan Baru" onclick="openAddOptionModal('tujuan')">+</button>
                            <button type="button" class="btn-sm-del" id="btnDelTujuan" title="Hapus Tujuan Terpilih" onclick="deleteOption('tujuan')" disabled>-</button>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label>Perihal Surat</label>
                        <textarea id="perihalSurat" class="form-control" rows="3" placeholder="Isi ringkasan perihal surat..."></textarea>
                    </div>

                    <div class="form-section-title">Lampiran (Maks. 500KB/file)</div>
                    <div class="form-group">
                        <label>File Utama (Wajib)</label>
                        <input type="file" id="fileSurat1" class="form-control" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required onchange="validateFileSize(this)">
                        <small style="color: #888; font-size: 0.75rem; margin-top: 4px;">Format: JPG, PNG, PDF, DOCX.</small>
                    </div>
                    <div class="form-group">
                        <label>File Tambahan (Opsional)</label>
                        <input type="file" id="fileSurat2" class="form-control" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" onchange="validateFileSize(this)">
                    </div>
                </div>
                <div class="modal-actions" style="margin-top: 30px; display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid var(--border-color); padding-top: 20px;">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" style="background-color: var(--secondary-color);">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAMBAH OPSI MODAL -->
    <div id="addOptionModal" class="modal-overlay">
        <div class="modal-content" style="max-width: 400px; padding: 1.5rem;">
            <div class="modal-header" style="margin-bottom: 15px; padding-bottom: 10px;">
                <h2 id="addOptionTitle" style="font-size: 1.25rem;">Tambah Data</h2>
                <button class="close-modal" onclick="closeAddOptionModal()">&times;</button>
            </div>
            <div class="form-group">
                <label id="addOptionLabel" style="margin-bottom:8px;">Nama Data</label>
                <input type="text" id="newOptionInput" class="form-control" placeholder="Ketik data baru..." onkeydown="if(event.key === 'Enter') saveNewOption()">
            </div>
            <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn-cancel" onclick="closeAddOptionModal()">Batal</button>
                <button type="button" onclick="saveNewOption()" style="background-color: var(--success-color);">Simpan</button>
            </div>
        </div>
    </div>

    <!-- PREVIEW MODAL -->
    <div id="previewModal" class="modal-overlay" onclick="if(event.target === this) closePreviewModal()">
        <div class="modal-content">
            <div class="preview-header">
                <h3 id="previewTitle">Pratinjau File</h3>
                <button class="close-modal" style="color: white;" onclick="closePreviewModal()">&times;</button>
            </div>
            <div class="preview-body" id="previewBody"></div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast">Notifikasi</div>

    <script>
        // --- KONFIGURASI & STATE ---
        const APP_VERSION = 'v3.0'; 
        const MAX_FILE_SIZE = 500 * 1024; 
        
        let mailData = JSON.parse(localStorage.getItem(`suratKeluarApp_${APP_VERSION}_data`)) || [];
        
        const defaultJenis = ["Surat Pengantar", "Surat Keterangan", "Surat Peringatan", "Surat Undangan", "Surat Tugas", "Surat Pemberitahuan", "Surat Permohonan"];
        const defaultTujuan = ["Dinas Pendidikan Kota Mataram", "Kemenag NTB", "Polsek Mataram", "Wali Murid", "Yayasan Pendidikan", "Sekolah Lain"];

        let jenisOptions = JSON.parse(localStorage.getItem(`app_${APP_VERSION}_jenis`)) || [...defaultJenis];
        let tujuanOptions = JSON.parse(localStorage.getItem(`app_${APP_VERSION}_tujuan`)) || [...defaultTujuan];

        let currentAddOptionType = null;
        let currentSearchFilter = "";
        
        // Filter State
        let filterMonth = ""; 
        let filterYear = "";

        // Month Names for Dropdown
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        // --- INISIALISASI ---
        document.addEventListener('DOMContentLoaded', () => {
            updateDate();
            initFilters(); // Initialize Month/Year Dropdowns
            populateDropdowns();
            renderTable();
            updateSearchSuggestions();
            loadSavedLogo();
            updateStatistics(); // Calculate initial stats
        });

        function enterApp() {
            document.getElementById('landingPage').classList.add('slideUp');
            setTimeout(() => { document.getElementById('landingPage').style.display = 'none'; }, 800);
        }

        function updateDate() {
            const today = new Date();
            const dateStr = today.toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
            document.getElementById('currentDate').innerText = dateStr;
            document.getElementById('sigDate').innerText = dateStr;
        }

        // --- FILTER LOGIC (BARU) ---
        function initFilters() {
            const monthSelect = document.getElementById('filterMonth');
            const yearSelect = document.getElementById('filterYear');
            const currentYear = new Date().getFullYear();

            // Populate Months
            monthNames.forEach((m, index) => {
                const opt = document.createElement('option');
                opt.value = index; // 0 for Jan, 1 for Feb, etc.
                opt.innerText = m;
                monthSelect.appendChild(opt);
            });

            // Populate Years (Current year - 5 to Current year + 1)
            for(let y = currentYear - 5; y <= currentYear + 1; y++) {
                const opt = document.createElement('option');
                opt.value = y;
                opt.innerText = y;
                yearSelect.appendChild(opt);
            }
            // Set default year to current year
            yearSelect.value = currentYear;
            filterYear = currentYear.toString();
        }

        function handleFilterChange() {
            filterMonth = document.getElementById('filterMonth').value;
            filterYear = document.getElementById('filterYear').value;
            renderTable(); // Re-render table with new filters
        }

        // --- STATISTIK LOGIC (BARU) ---
        function updateStatistics() {
            // 1. Total Data (Rumus: Jumlah seluruh elemen array)
            const total = mailData.length;

            // 2. Data Bulan Ini (Rumus: Filter data di mana Bulan == Bulan Sekarang DAN Tahun == Tahun Sekarang)
            const now = new Date();
            const currentMonthIdx = now.getMonth();
            const currentYearIdx = now.getFullYear();

            const thisMonthCount = mailData.filter(item => {
                const d = new Date(item.tgl);
                return d.getMonth() === currentMonthIdx && d.getFullYear() === currentYearIdx;
            }).length;

            // Update DOM
            document.getElementById('statTotal').innerText = total;
            document.getElementById('statThisMonth').innerText = thisMonthCount;
            // StatFiltered diupdate di dalam renderTable
        }

        // --- LOGO HANDLING ---
        function handleLogoUpload(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.size > 2 * 1024 * 1024) { showToast("⚠️ Logo terlalu besar! Maksimal 2MB."); return; }
                const reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        localStorage.setItem(`app_${APP_VERSION}_logo`, e.target.result);
                        updateLogoDisplay(e.target.result);
                        showToast("✅ Logo berhasil diperbarui");
                    } catch (err) { showToast("❌ Gagal menyimpan logo (Storage penuh)."); }
                };
                reader.readAsDataURL(file);
            }
        }

        function loadSavedLogo() {
            const savedLogo = localStorage.getItem(`app_${APP_VERSION}_logo`);
            if (savedLogo) updateLogoDisplay(savedLogo);
        }

        function updateLogoDisplay(src) { document.getElementById('appLogo').src = src; }

        // --- MANAJEMEN OPSI ---
        function populateDropdowns() {
            const jSelect = document.getElementById('jenisSurat');
            const currentVal = jSelect.value;
            jSelect.innerHTML = '<option value="">-- Pilih Jenis --</option>';
            jenisOptions.forEach(opt => { jSelect.innerHTML += `<option value="${opt}">${opt}</option>`; });
            jSelect.value = currentVal; 

            const tSelect = document.getElementById('tujuanSurat');
            const currentTujuan = tSelect.value;
            tSelect.innerHTML = '<option value="">-- Pilih Tujuan --</option>';
            tujuanOptions.forEach(opt => { tSelect.innerHTML += `<option value="${opt}">${opt}</option>`; });
            tSelect.value = currentTujuan;

            updateDeleteBtnState('jenis');
            updateDeleteBtnState('tujuan');
            updateSearchSuggestions();
        }

        function updateDeleteBtnState(type) {
            if (type === 'jenis') {
                const select = document.getElementById('jenisSurat');
                document.getElementById('btnDelJenis').disabled = (select.value === "" || select.value === undefined);
            } else {
                const select = document.getElementById('tujuanSurat');
                document.getElementById('btnDelTujuan').disabled = (select.value === "" || select.value === undefined);
            }
        }

        function deleteOption(type) {
            let select, optionsArray, storageKey, itemLabel;
            if (type === 'jenis') {
                select = document.getElementById('jenisSurat');
                optionsArray = jenisOptions;
                storageKey = `app_${APP_VERSION}_jenis`;
                itemLabel = "Jenis Surat";
            } else {
                select = document.getElementById('tujuanSurat');
                optionsArray = tujuanOptions;
                storageKey = `app_${APP_VERSION}_tujuan`;
                itemLabel = "Tujuan Surat";
            }
            const valToDelete = select.value;
            if (!valToDelete) return;
            if (mailData.some(item => (type === 'jenis' ? item.jenis : item.tujuan) === valToDelete)) {
                showToast(`⚠️ Gagal: ${itemLabel} "${valToDelete}" sedang digunakan di data surat.`); return;
            }
            if(confirm(`Hapus ${itemLabel} "${valToDelete}" dari daftar?`)) {
                const index = optionsArray.indexOf(valToDelete);
                if (index > -1) {
                    optionsArray.splice(index, 1);
                    localStorage.setItem(storageKey, JSON.stringify(optionsArray));
                    if(type === 'jenis') jenisOptions = optionsArray; else tujuanOptions = optionsArray;
                    select.value = "";
                    populateDropdowns();
                    showToast(`🗑️ ${itemLabel} berhasil dihapus`);
                }
            }
        }

        function openAddOptionModal(type) {
            currentAddOptionType = type;
            const modal = document.getElementById('addOptionModal');
            document.getElementById('addOptionTitle').innerText = type === 'jenis' ? "Tambah Jenis Surat" : "Tambah Tujuan Surat";
            document.getElementById('addOptionLabel').innerText = type === 'jenis' ? "Nama Jenis Surat" : "Instansi / Tujuan";
            document.getElementById('newOptionInput').value = "";
            modal.classList.add('open');
            setTimeout(() => document.getElementById('newOptionInput').focus(), 100);
        }

        function closeAddOptionModal() {
            document.getElementById('addOptionModal').classList.remove('open');
            currentAddOptionType = null;
        }

        function saveNewOption() {
            const input = document.getElementById('newOptionInput');
            const val = input.value.trim();
            if (!val) { showToast("⚠️ Data tidak boleh kosong"); return; }
            
            if (currentAddOptionType === 'jenis') {
                if (jenisOptions.includes(val)) { showToast("⚠️ Jenis ini sudah ada"); return; }
                jenisOptions.push(val);
                localStorage.setItem(`app_${APP_VERSION}_jenis`, JSON.stringify(jenisOptions));
                document.getElementById('jenisSurat').value = val;
                updateDeleteBtnState('jenis');
            } else {
                if (tujuanOptions.includes(val)) { showToast("⚠️ Tujuan ini sudah ada"); return; }
                tujuanOptions.push(val);
                localStorage.setItem(`app_${APP_VERSION}_tujuan`, JSON.stringify(tujuanOptions));
                document.getElementById('tujuanSurat').value = val;
                updateDeleteBtnState('tujuan');
            }
            populateDropdowns();
            closeAddOptionModal();
        }

        // --- LOGIKA PENCARIAN & RENDER ---
        function updateSearchPlaceholder() {
            const type = document.getElementById('searchType').value;
            const input = document.getElementById('searchInput');
            input.value = ""; currentSearchFilter = ""; 
            input.placeholder = type === 'jenis' ? "Cari jenis surat (cth: Undangan)..." : "Cari tujuan surat (cth: Dinas)...";
            renderTable();
        }

        function updateSearchSuggestions() {
            const datalist = document.getElementById('searchSuggestions');
            const type = document.getElementById('searchType').value;
            datalist.innerHTML = ''; 
            let options = type === 'jenis' ? jenisOptions : tujuanOptions;
            const dataKeys = type === 'jenis' ? [...new Set(mailData.map(i => i.jenis))] : [...new Set(mailData.map(i => i.tujuan))];
            options = [...new Set([...options, ...dataKeys])];
            options.forEach(opt => {
                if(opt) {
                    const option = document.createElement('option');
                    option.value = opt; datalist.appendChild(option);
                }
            });
        }

        function handleSearch() {
            const type = document.getElementById('searchType').value;
            const query = document.getElementById('searchInput').value.toLowerCase();
            currentSearchFilter = query; 
            renderTable();
        }

        function validateFileSize(input) {
            if (input.files.length > 0) {
                const file = input.files[0];
                if (file.size > MAX_FILE_SIZE) {
                    showToast(`⚠️ File "${file.name}" terlalu besar! Maksimal 500KB.`);
                    input.value = ""; 
                }
            }
        }

        // --- CRUD UTAMA ---
        function renderTable() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';
            
            // Filter Logic: Search Text + Month + Year
            let displayData = [...mailData];
            
            // 1. Filter by Text
            if (currentSearchFilter && currentSearchFilter.length > 0) {
                const type = document.getElementById('searchType').value;
                displayData = displayData.filter(item => {
                    const targetField = type === 'jenis' ? item.jenis : item.tujuan;
                    return targetField && targetField.toLowerCase().includes(currentSearchFilter);
                });
            }

            // 2. Filter by Month
            if (filterMonth !== "") {
                displayData = displayData.filter(item => {
                    const d = new Date(item.tgl);
                    return d.getMonth() == filterMonth; // Index 0-11
                });
            }

            // 3. Filter by Year
            if (filterYear !== "") {
                displayData = displayData.filter(item => {
                    const d = new Date(item.tgl);
                    return d.getFullYear() == filterYear;
                });
            }

            // Update Statistik Filtered
            document.getElementById('statFiltered').innerText = displayData.length;

            // Update Text Print Period
            const periodText = [];
            if (filterMonth !== "") periodText.push(monthNames[parseInt(filterMonth)]);
            if (filterYear !== "") periodText.push(filterYear);
            document.getElementById('printPeriodText').innerText = periodText.length > 0 ? `Periode: ${periodText.join(' ')}` : '';

            if (displayData.length === 0) {
                tbody.innerHTML = `<tr><td colspan="8" style="text-align:center; padding: 3rem; color: #999;">Tidak ada data sesuai filter.</td></tr>`;
                return;
            }

            displayData.sort((a, b) => new Date(b.tgl) - new Date(a.tgl));

            displayData.forEach((item, idx) => {
                const tr = document.createElement('tr');
                const dateStr = new Date(item.tgl).toLocaleDateString('id-ID');
                
                let fileDisplay = `<span style="color:#ccc; font-style:italic;">-</span>`;
                let printFileText = ``;
                const files = [
                    { data: item.file1, type: item.file1Type, name: item.file1Name },
                    { data: item.file2, type: item.file2Type, name: item.file2Name }
                ];
                const fileBadges = [];
                const printTexts = [];

                files.forEach((f, fIdx) => {
                    if (f.data) {
                        let badgeClass = 'img', icon = '🖼️', typeLabel = 'Gambar';
                        if (f.type && f.type.includes('pdf')) { badgeClass = 'pdf'; icon = '📄'; typeLabel = 'PDF'; }
                        else if (f.type && (f.type.includes('word') || f.type.includes('document'))) { badgeClass = 'word'; icon = 'W'; typeLabel = 'Word'; }

                        fileBadges.push(`<span class="file-badge ${badgeClass}" onclick="openPreviewByNo('${item.no}', ${fIdx})">${icon} ${typeLabel}</span>`);
                        printTexts.push(`${typeLabel}`);
                    }
                });

                if (fileBadges.length > 0) {
                    fileDisplay = fileBadges.join(' ');
                    printFileText = `<span class="file-print-text">${printTexts.join(', ')}</span>`;
                }

                tr.innerHTML = `
                    <td>${idx + 1}</td>
                    <td style="font-weight:600; color:var(--primary-color);">${item.no}</td>
                    <td>${dateStr}</td>
                    <td><span style="background:#e8f4fd; color:var(--secondary-color); padding:4px 8px; border-radius:4px; font-size:0.8rem; font-weight:600;">${item.jenis}</span></td>
                    <td>${item.tujuan}</td>
                    <td style="max-width:250px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;" title="${item.perihal}">${item.perihal}</td>
                    <td style="text-align:center;">${fileDisplay} ${printFileText}</td>
                    <td>
                        <button class="btn-action btn-edit" onclick="editDataByNo('${item.no}')">Edit</button>
                        <button class="btn-action btn-delete" onclick="deleteDataByNo('${item.no}')">Hapus</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function findIndexByNo(no) { return mailData.findIndex(item => item.no === no); }

        function processFile(fileInput) {
            return new Promise((resolve, reject) => {
                const file = fileInput.files[0];
                if (!file) { resolve(null); return; }
                if (file.size > MAX_FILE_SIZE) { reject(new Error(`File "${file.name}" terlalu besar! Maksimal 500KB.`)); return; }
                const reader = new FileReader();
                reader.onload = () => resolve({ data: reader.result, type: file.type, name: file.name });
                reader.onerror = () => reject(new Error("Gagal membaca file"));
                reader.readAsDataURL(file);
            });
        }

        async function handleFormSubmit(e) {
            e.preventDefault();
            const btnSubmit = e.target.querySelector('button[type="submit"]');
            const originalText = btnSubmit.innerText;
            const isEdit = document.getElementById('editIndex').value !== "-1";
            
            try {
                btnSubmit.disabled = true; btnSubmit.innerText = "Memproses...";
                const noSurat = document.getElementById('nomorSurat').value;
                const idx = isEdit ? findIndexByNo(noSurat) : -1;

                if (!isEdit && findIndexByNo(noSurat) !== -1) { throw new Error("Nomor Surat sudah terdaftar! Gunakan nomor lain."); }

                const f1 = await processFile(document.getElementById('fileSurat1'));
                const f2 = await processFile(document.getElementById('fileSurat2'));

                const newData = {
                    no: noSurat,
                    tgl: document.getElementById('tanggalSurat').value,
                    jenis: document.getElementById('jenisSurat').value,
                    tujuan: document.getElementById('tujuanSurat').value,
                    perihal: document.getElementById('perihalSurat').value,
                    file1: f1 ? f1.data : null, file1Type: f1 ? f1.type : null, file1Name: f1 ? f1.name : null,
                    file2: f2 ? f2.data : null, file2Type: f2 ? f2.type : null, file2Name: f2 ? f2.name : null
                };

                if (idx === -1) {
                    mailData.push(newData);
                    mailData.sort((a, b) => new Date(b.tgl) - new Date(a.tgl));
                    showToast("✅ Surat Keluar berhasil disimpan");
                } else {
                    const old = mailData[idx];
                    if (!f1 && old.file1) { newData.file1 = old.file1; newData.file1Type = old.file1Type; newData.file1Name = old.file1Name; }
                    if (!f2 && old.file2) { newData.file2 = old.file2; newData.file2Type = old.file2Type; newData.file2Name = old.file2Name; }
                    mailData[idx] = newData;
                    mailData.sort((a, b) => new Date(b.tgl) - new Date(a.tgl));
                    showToast("✅ Data berhasil diperbarui");
                }

                saveToStorage();
                updateStatistics(); // Hitung ulang statistik otomatis
                closeModal();
                renderTable();
            } catch (err) { showToast("❌ " + err.message); } finally { btnSubmit.disabled = false; btnSubmit.innerText = originalText; }
        }

        function deleteDataByNo(no) {
            if(confirm("Hapus data surat ini? Tindakan ini tidak dapat dibatalkan.")) {
                const idx = findIndexByNo(no);
                if (idx !== -1) {
                    mailData.splice(idx, 1);
                    saveToStorage();
                    updateStatistics(); // Hitung ulang statistik otomatis
                    renderTable();
                    showToast("🗑️ Data dihapus");
                }
            }
        }

        function editDataByNo(no) {
            const item = mailData[findIndexByNo(no)];
            if (!item) return;
            document.getElementById('editIndex').value = item.no;
            document.getElementById('modalTitle').innerText = "✏️ Edit Surat Keluar";
            document.getElementById('nomorSurat').value = item.no;
            document.getElementById('nomorSurat').readOnly = true; 
            document.getElementById('tanggalSurat').value = item.tgl;
            populateDropdowns(); 
            document.getElementById('jenisSurat').value = item.jenis;
            document.getElementById('tujuanSurat').value = item.tujuan;
            document.getElementById('perihalSurat').value = item.perihal;
            document.getElementById('fileSurat1').value = "";
            document.getElementById('fileSurat2').value = "";
            document.getElementById('fileSurat1').required = false;
            openModal();
        }

        function saveToStorage() {
            try { localStorage.setItem(`suratKeluarApp_${APP_VERSION}_data`, JSON.stringify(mailData)); } 
            catch (e) {
                console.error(e);
                if (e.name === 'QuotaExceededError') { showToast("❌ Penyimpanan Browser Penuh! Hapus data lama."); } 
                else { showToast("❌ Gagal menyimpan data."); }
            }
        }

        // --- BACKUP / IMPORT / RESTORE ---
        function backupData() {
            const dataStr = JSON.stringify(mailData, null, 2);
            const blob = new Blob([dataStr], { type: "application/json" });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `backup_surat_keluar_${new Date().toISOString().slice(0,10)}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showToast("💾 Backup didownload");
        }

        function importData(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                try {
                    const incomingData = JSON.parse(e.target.result);
                    if (Array.isArray(incomingData)) {
                        const mappedData = incomingData.map(item => ({
                            no: item.no || item.nomorSurat, tgl: item.tgl || item.tanggalSurat,
                            jenis: item.jenis || item.jenisSurat, tujuan: item.tujuan || item.tujuanSurat,
                            perihal: item.perihal || item.isiSurat, 
                            file1: item.file1 || item.gambarBase64,
                            file1Type: item.file1Type || (item.gambarBase64 ? 'image/jpeg' : null),
                            file1Name: item.file1Name || (item.gambarBase64 ? 'Lampiran.jpg' : null),
                            file2: item.file2 || item.gambarBase642, file2Type: item.file2Type, file2Name: item.file2Name
                        }));
                        if(!confirm(`Akan menambahkan ${mappedData.length} data baru. Lanjutkan?`)) return;
                        mailData = mailData.concat(mappedData);
                        const uniqueMap = new Map(); mailData.forEach(item => uniqueMap.set(item.no, item));
                        mailData = Array.from(uniqueMap.values());
                        mailData.sort((a, b) => new Date(b.tgl) - new Date(a.tgl));
                        saveToStorage();
                        updateStatistics(); // Update stats after import
                        renderTable();
                        showToast(`✅ ${mappedData.length} Data berhasil ditambahkan.`);
                    } else { showToast("⚠️ Format JSON tidak valid"); }
                } catch (error) { showToast("❌ Gagal membaca file: " + error.message); }
            };
            reader.readAsText(file);
            input.value = '';
        }

        function restoreData(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                try {
                    const parsed = JSON.parse(e.target.result);
                    if (Array.isArray(parsed)) {
                        if(confirm("PERINGATAN: Ini akan MENIMPA semua data. Lanjutkan?")) {
                            mailData = parsed;
                            mailData.sort((a, b) => new Date(b.tgl) - new Date(a.tgl));
                            saveToStorage();
                            updateStatistics(); // Update stats after restore
                            renderTable();
                            showToast("🔄 Sistem berhasil dipulihkan.");
                        }
                    }
                } catch (err) { showToast("❌ File rusak atau format salah"); }
            };
            reader.readAsText(file);
            input.value = '';
        }

        // --- PREVIEW ---
        function openPreviewByNo(no, fileIdx) {
            const item = mailData[findIndexByNo(no)];
            const dataKey = fileIdx === 0 ? 'file1' : 'file2';
            const typeKey = fileIdx === 0 ? 'file1Type' : 'file2Type';
            const nameKey = fileIdx === 0 ? 'file1Name' : 'file2Name';
            const fileData = item[dataKey];
            const fileType = item[typeKey];
            const fileName = item[nameKey] || "Dokumen";

            const modal = document.getElementById('previewModal');
            const body = document.getElementById('previewBody');
            const title = document.getElementById('previewTitle');
            title.innerText = fileName;
            body.innerHTML = '';

            if (!fileData) return;

            if (fileType && fileType.startsWith('image/')) {
                const img = document.createElement('img'); img.src = fileData; body.appendChild(img);
            } else if (fileType === 'application/pdf') {
                const iframe = document.createElement('iframe'); iframe.src = fileData; body.appendChild(iframe);
            } else {
                const div = document.createElement('div');
                div.className = 'doc-placeholder';
                div.innerHTML = `<span class="doc-icon">📄</span><div style="font-weight:bold; margin-bottom:10px; font-size:1.1rem;">${fileName}</div><p style="color:#666; margin-bottom:20px;">Format ini tidak bisa dipratinjau langsung.</p><a href="${fileData}" download="${fileName}" class="btn-download">Download File</a>`;
                body.appendChild(div);
            }
            modal.classList.add('open');
        }

        function closePreviewModal() { document.getElementById('previewModal').classList.remove('open'); }
        
        function openModal() { document.getElementById('inputModal').classList.add('open'); populateDropdowns(); }
        
        function closeModal() {
            const modal = document.getElementById('inputModal');
            modal.classList.remove('open');
            setTimeout(() => {
                document.getElementById('mailForm').reset();
                document.getElementById('editIndex').value = "-1";
                document.getElementById('modalTitle').innerText = "📝 Formulir Surat Keluar";
                document.getElementById('nomorSurat').readOnly = false;
                document.getElementById('fileSurat1').required = true;
                document.getElementById('btnDelJenis').disabled = true;
                document.getElementById('btnDelTujuan').disabled = true;
            }, 300);
        }
        
        function showToast(msg) {
            const t = document.getElementById("toast");
            t.innerText = msg;
            t.className = "show";
            setTimeout(() => t.className = t.className.replace("show", ""), 3000);
        }
    </script>
</body>
</html>