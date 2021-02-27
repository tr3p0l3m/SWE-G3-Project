<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>BiblioTeca</title>
    
    <link rel="stylesheet" href="homepageHeaderstyle.css">
    <style>
        img{
            height: 350px;
            
        }
        .card{
            margin-right: 15px;
            margin-left: 15px;
        }
        .card:hover{
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">BiblioTeca</div>
        <div class="nav-items">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="#">Novels</a></li>
            <li><a href="#">Textbooks</a></li>
            <li><a href="#">Journals</a></li>
            <li><a href="#">Articles</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <a name="login" id="login" class="btn btn-primary" href="loginpage.php" role="button">Login</a>
    </nav>

    <div class="container container-fluid">
        <h2 class="display-4 text-center">BiblioTeca</h2>
        <h3 class="display-5 text-center">Library Management</h3>
        
        <div class="card-group">
            <div class="card"><a href="login.php" style="text-decoration: none;">
                <img class="card-img-top"  src="http://atlantablackstar.com/wp-content/uploads/2015/07/college-students-studying2_0.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-primary">Novels</h4>
                    <p class="card-text text-info">Find novels that will excite and entertain you</p>
                    </a>    
                </div>
                
            </div>
            <div class="card"><a href="login.php" style="text-decoration: none;">
                <img class="card-img-top"  src="https://www.popsinc.org/wp-content/uploads/2016/07/workshops.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-primary">Textbooks</h4>
                    <p class="card-text text-info">Find textbooks for all courses offered in the university</p>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="card-group">
            <div class="card"><a href="login.php" style="text-decoration: none;">
                <img class="card-img-top"  src="https://thumbs.dreamstime.com/z/stack-newspapers-stack-newspapers-recycling-isolated-knowledge-documentation-news-113570713.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-primary">Articles</h4>
                    <p class="card-text text-info">Find articles on the latest news all over the globe</p>
                    </a>
                </div>
            </div>
            <div class="card"><a href="login.php" style="text-decoration: none;">
                <img class="card-img-top"  src="https://www.lgdalliance.org/wp-content/uploads/2011/07/iStock_000015772826XSmall.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-primary">Journals</h4>
                    <p class="card-text text-info">Find journals on the latest research and theories</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <br>
    
    <?php include_once "homepageFooter.php" ?>

    
</body>
</html>
