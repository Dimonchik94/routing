<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="/assets/img/favicon.jpg" type="image/x-icon">
        <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/sidebar.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">
                    <img id="logo" src="/assets/img/logo.jpg">
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
        <?php if (empty($_SESSION)): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/user/registration">Registration</a>
          <a class="dropdown-item" href="/user/auth">Auth</a>
      </li>
        <?php elseif (isset($_SESSION['username'])): ?>
            <?php if ( $_SESSION['status'] == 'admin' ): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">Admin panel <span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['username']; ?>  Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/user/profile">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/user/logout">Logout</a>
            </div>
        </li>
        <?php endif; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        </header>

