<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registry Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Define Color Palette */
        :root {
            --primary-accent: #3498db;   /* Calm blue accent */
            --bg-color: #f4f6f8;        /* Light grey background */
            --form-bg: #ffffff;         /* Pure white form background */
            --table-header: #2c3e50;    /* Soft dark grey/navy */
            --text-dark: #333333;
            --text-muted: #7f8c8d;
            --border-color: #e2e6ea;
        }

        body { 
            background-color: var(--bg-color); 
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        /* Modernized Header */
        .header-section { 
            background-color: #ffffff; 
            border-bottom: 2px solid var(--border-color); 
            padding: 25px 0; 
            margin-bottom: 40px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        
        .header-title {
            font-weight: 600;
            color: var(--table-header);
            margin-bottom: 5px;
        }

        .header-subtitle {
            color: var(--primary-accent);
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        /* Clean Cards */
        .card { 
            border: 1px solid var(--border-color); 
            border-radius: 12px;
            background-color: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.03) !important;
        }

        .card-header { 
            border-bottom: 1px solid var(--border-color); 
            background-color: #ffffff;
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
            padding: 18px;
        }

        .card-title {
            font-weight: 600;
            color: var(--table-header);
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        .card-title i {
            color: var(--primary-accent);
            margin-right: 12px;
        }

        .card-body {
            padding: 25px;
        }

        /* Modern Table */
        .table {
            border-collapse: separate;
            border-spacing: 0 8px; /* Vertical gap between rows */
        }

        .table > :not(caption) > * > * {
            border-bottom-width: 0;
            background-color: transparent;
        }

        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            color: var(--text-muted);
            letter-spacing: 1px;
            padding: 12px 20px;
            background-color: var(--bg-color);
            border-radius: 8px;
        }

        .table tbody tr {
            background-color: #ffffff;
            transition: all 0.2s;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        
        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.03);
            transform: translateY(-2px);
        }

        .table td {
            padding: 18px 20px;
            color: var(--text-dark);
            vertical-align: middle;
        }
        
        .table tbody td:first-child { border-top-left-radius: 8px; border-bottom-left-radius: 8px; }
        .table tbody td:last-child { border-top-right-radius: 8px; border-bottom-right-radius: 8px; }

        /* Modern Inputs */
        .form-label {
            font-weight: 500;
            color: var(--table-header);
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            padding: 12px;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            border-color: var(--primary-accent);
        }

        /* Modern Buttons */
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .btn-success:hover {
            background-color: #2ecc71;
            border-color: #2ecc71;
            transform: translateY(-1px);
        }

        .btn-action {
            padding: 6px 14px;
            font-size: 0.85rem;
        }
        
        .btn-delete {
            background-color: transparent;
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }
        
        .btn-delete:hover {
            background-color: #e74c3c;
            color: #ffffff;
        }

    </style>
</head>
<body>

<div class="header-section shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h1 class="header-title display-6">System Registry</h1>
            <p class="header-subtitle mb-0">Student Information Management</p>
        </div>
        <div class="text-muted">
            <i class="fas fa-chart-line fa-lg me-2"></i>Dashboard V1.0
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        
        <div class="col-lg-4 col-md-5 mb-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-plus-circle"></i> Add New Record</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('student/store') ?>" method="post">
                        <div class="mb-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="John B. Dela Cruz" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="john.dc@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Course</label>
                            <input type="text" name="course" class="form-control form-control-lg" placeholder="e.g. BSIT-2A" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-save me-2"></i>Register Student
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-7">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-table"></i> Existing Database</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($students): ?>
                                    <?php 
                                        $counter = 1;
                                        foreach($students as $s): 
                                    ?>
                                    <tr>
                                        <td class="text-muted"><?= $counter++ ?></td>
                                        <td class="fw-bold"><?= $s['name'] ?></td>
                                        <td><?= $s['email'] ?></td>
                                        <td><span class="badge bg-light text-primary"><?= $s['course'] ?></span></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('student/delete/'.$s['id']) ?>" 
                                               class="btn btn-delete btn-sm btn-action" 
                                               onclick="return confirm('Permanently delete this record?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="fas fa-database fa-3x mb-3 d-block text-border"></i>
                                            No active student records found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>