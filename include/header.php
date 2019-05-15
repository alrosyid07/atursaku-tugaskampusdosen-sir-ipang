       
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="home.php"><img src="images/logo11.png" alt="Logo"></a>
                    

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
               

            </div>
            

            <div class="top-right"> 
                
                <div class="header-menu head-menu"> 

                    <div class="header-left">

                         <div class="navbar-header "> 
                    <a class="nav-link color-gray " href="?page=user" style= >Hello, <?php echo $_SESSION['username']; ?></a>
                     <a class="btn btn-danger" href="./logout.php">KELUAR</a>

                       
                </div>  
            </div>
        </header>
