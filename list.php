<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>HBC Select - The platform where you select what you want to watch!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="icon" href="favicon.ico">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="main.07a59de7b920cd76b874.css" rel="stylesheet">
<link rel="stylesheet" href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
<link rel="stylesheet" href="assets/pe-icon-7-stroke/css/helper.css">
<style>
a.custom-card,
a.custom-card:hover {
  color: inherit;
  text-decoration: none;
}
</style>
<script src='https://cdn.jsdelivr.net/npm/@widgetbot/crate@3' async defer>
    new Crate({
        server: '573181078953787394', // HBC
        channel: '922954036905398312' // #🎮︙viewer-chat
    })
</script>
</head>
<body>
<div class="app-container app-theme-gray app-sidebar-full">
        <div class="app-main">
        <?php include("assets/content/sidebar.txt"); ?>



            <div class="app-sidebar-overlay d-none animated fadeIn"></div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="HBC Select" class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <div class="app-header__menu">
                            <span>
                                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                    <span class="btn-icon-wrapper">
                                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                                    </span>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">
                        <div class="page-title-heading">
                            Welcome
                            <div class="page-title-subheading">
                                HBC Select is your go-to source for all things HBC Network including news and esports.
                            </div>
                        </div>
                        <?php 
                            $data = $_GET["data"]; 
                            include("assets/content/seasons/$data.txt"); 
                        ?>
                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout app-inner-layout-page">
                        <div class="container-fluid"> 
                            <div class="row playlist">
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script>

function getUrlParameters(parameter, staticURL, decode){

var currLocation = (staticURL.length)? staticURL : window.location.search,
parArr = currLocation.split("?")[1].split("&"),
returnBool = true;

for(var i = 0; i < parArr.length; i++){
    parr = parArr[i].split("=");
    if(parr[0] == parameter){
        return (decode) ? decodeURIComponent(parr[1]) : parr[1];
        returnBool = true;
    }else{
        returnBool = false;            
    }
}
    if(!returnBool) return false;  
}

var idParameter = getUrlParameters("list", "", true);

$.ajax({ 
    type: 'GET', 
    url: 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=5000&playlistId=' + idParameter +'&key=AIzaSyDfbSiXsIQ64KS2uTQj2QSY92Id8xlxYDM', 
    dataType: 'json',
    success: function (data) { 

        let items = data.items;
        let playlist = '';

        for (var i = 0; i<items.length; i++) {
            console.log(items[i].snippet);
            playlist += `<div class="col-md-6 col-xl-3">
                                    <a href="video.php?id=${items[i].snippet.resourceId.videoId}" class="custom-card">
                                    <img width="100%" src="${items[i].snippet.thumbnails.maxres.url}" class="card-img-top">
                                    <div class="card-shadow-focus mb-3 widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">${items[i].snippet.title}</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper">
                                                <div class="progress-bar-xs mb-3 progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                </div>
                                                <div class="progress-sub-label">
                                                    <div class="sub-label-left"><span class="dateofmatch">Published: ${items[i].snippet.publishedAt}</span></div>
                                                    <div class="sub-label-right"><div class="badge badge-dark">VOD</div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a></div>`
        }

        document.querySelector('.playlist').innerHTML = playlist;
    }
});
</script>
</body>
</html>
