<div id="content">
    <nav id="admin-nav" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">All users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users?status=user">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users?status=moderator">Moderators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users?status=baned">Baned users</a>
                </li>
            </ul>
            <form method="post" class="form-inline my-2 my-lg-0">
                <input name="user_name" class="form-control mr-sm-2" type="search" placeholder="Find user" aria-label="Search">
                <button name="find" class="btn btn-outline-success my-2 my-sm-0" type="submit">Find</button>
            </form>
        </div>
    </nav>
    <?php

        var_dump($user);

    ?>
</div>
