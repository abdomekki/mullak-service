<section id="navbar" class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand mr-5" href="home.php">Mullak Service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="import.php">Import</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="export.php">Export</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="outstanding.php">Outstanding balance</a>
            <a class="dropdown-item" href="expenses.php">Expenses</a>
            <a class="dropdown-item" href="expensesuser.php">Users Expenses</a>
            
        </li>
        
        </ul>
        <form class="form-inline my-2 my-lg-0" action="logout.php">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">log out</button>
        </form>
    </div>
    </nav>

    </section>