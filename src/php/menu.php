<?php
    require("../includes/api.php");
    $db->checklogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        include "../includes/header.php"
    ?>
    <h5> Bem Vindo <?php echo $db->idtoname($_SESSION['user']);?>!</h5>
    <main style="box-sizing:border-box;">

        <div data-bs-ride="carousel" style="margin-bottom:64px;touch-action:pan-y;position:relative;box-sizing:border-box;">
            <div style="position:absolute;right:0px;bottom:0px;left:0px;z-index:2;display:flex;justify-content:center;padding:0px;margin-right:237.438px;margin-bottom:16px;margin-left:237.438px;list-style:outside none none;box-sizing:border-box;">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" style="box-sizing:content-box;flex: 0 1 auto;width: 30px;height:3px;padding:0px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgb(255, 255, 255);-webkit-background-clip:padding-box;border-width:10px 0px;border-right-style:none;border-left-style:none;border-right-color:rgb(0, 0, 0);border-left-color:rgb(0, 0, 0);border-image:none;border-top-style:solid;border-top-color:rgba(0, 0, 0, 0);border-bottom-style:solid;border-bottom-color:rgba(0, 0, 0, 0);opacity:0.5;transition:opacity 0.6s ease 0s;appearance:button;text-transform:none;margin:0px 3px;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:16px;line-height:24px;border-radius:0px;-webkit-background-clip:padding-box;"></button> <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="box-sizing:content-box;flex: 0 1 auto;width: 30px;height:3px;padding:0px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgb(255, 255, 255);-webkit-background-clip:padding-box;border-width:10px 0px;border-right-style:none;border-left-style:none;border-right-color:rgb(0, 0, 0);border-left-color:rgb(0, 0, 0);border-image:none;border-top-style:solid;border-top-color:rgba(0, 0, 0, 0);border-bottom-style:solid;border-bottom-color:rgba(0, 0, 0, 0);opacity:0.5;transition:opacity 0.6s ease 0s;appearance:button;text-transform:none;margin:0px 3px;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:16px;line-height:24px;border-radius:0px;-webkit-background-clip:padding-box;"></button> <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" aria-current="true" style="opacity:1;box-sizing:content-box;flex: 0 1 auto;width: 30px;height:3px;padding:0px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgb(255, 255, 255);-webkit-background-clip:padding-box;border-width:10px 0px;border-right-style:none;border-left-style:none;border-right-color:rgb(0, 0, 0);border-left-color:rgb(0, 0, 0);border-image:none;border-top-style:solid;border-top-color:rgba(0, 0, 0, 0);border-bottom-style:solid;border-bottom-color:rgba(0, 0, 0, 0);transition:opacity 0.6s ease 0s;appearance:button;text-transform:none;margin:0px 3px;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:16px;line-height:24px;border-radius:0px;-webkit-background-clip:padding-box;"></button>
            </div>
            <div style="position:relative;width: 100%;overflow:hidden;box-sizing:border-box;">
                <div style="height:512px;position:relative;display:none;float:left;width: 100%;margin-right:-100%;backface-visibility:hidden;transition:transform 0.6s ease-in-out 0s;box-sizing:border-box;">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect>
                    </svg>
                    <div style="max-width:1320px;width: 100%;padding-right:12px;padding-left:12px;margin-right: auto;margin-left: auto;box-sizing:border-box;">
                        <div style="bottom:48px;z-index:10;text-align:left;position:absolute;right:15%;left:15%;padding-top:20px;padding-bottom:20px;color:rgb(255, 255, 255);box-sizing:border-box;">
                            <h1 style="font-size:40px;margin-top:0px;margin-bottom:8px;font-weight:500;line-height:48px;box-sizing:border-box;">Example headline.</h1>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;">Some representative placeholder content for the first slide of the carousel.</p>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;"><a href="#" style="padding:8px 16px;font-size:20px;border-radius:4.8px;color:rgb(255, 255, 255);background-color:rgb(13, 110, 253);border-color:rgb(13, 110, 253);display:inline-block;font-weight:400;line-height:30px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(13, 110, 253);transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div style="height:512px;position:relative;display:none;float:left;width: 100%;margin-right:-100%;backface-visibility:hidden;transition:transform 0.6s ease-in-out 0s;box-sizing:border-box;">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect>
                    </svg>
                    <div style="max-width:1320px;width: 100%;padding-right:12px;padding-left:12px;margin-right: auto;margin-left: auto;box-sizing:border-box;">
                        <div style="bottom:48px;z-index:10;position:absolute;right:15%;left:15%;padding-top:20px;padding-bottom:20px;color:rgb(255, 255, 255);text-align:center;box-sizing:border-box;">
                            <h1 style="font-size:40px;margin-top:0px;margin-bottom:8px;font-weight:500;line-height:48px;box-sizing:border-box;">Another example headline.</h1>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;">Some representative placeholder content for the second slide of the carousel.</p>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;"><a href="#" style="padding:8px 16px;font-size:20px;border-radius:4.8px;color:rgb(255, 255, 255);background-color:rgb(13, 110, 253);border-color:rgb(13, 110, 253);display:inline-block;font-weight:400;line-height:30px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(13, 110, 253);transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div style="height:512px;display:block;position:relative;float:left;width: 100%;margin-right:-1583px;backface-visibility:hidden;transition:transform 0.6s ease-in-out 0s;box-sizing:border-box;">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect>
                    </svg>
                    <div style="max-width:1320px;width: 100%;padding-right:12px;padding-left:12px;margin-right: auto;margin-left: auto;box-sizing:border-box;">
                        <div style="bottom:48px;z-index:10;text-align:right;position:absolute;right:237.438px;left:237.438px;padding-top:20px;padding-bottom:20px;color:rgb(255, 255, 255);box-sizing:border-box;">
                            <h1 style="font-size:40px;margin-top:0px;margin-bottom:8px;font-weight:500;line-height:48px;box-sizing:border-box;">One more for good measure.</h1>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;">Some representative placeholder content for the third slide of this carousel.</p>
                            <p style="margin-bottom:20px;font-size:20px;line-height:28px;margin-top:0px;box-sizing:border-box;"><a href="#" style="padding:8px 16px;font-size:20px;border-radius:4.8px;color:rgb(255, 255, 255);background-color:rgb(13, 110, 253);border-color:rgb(13, 110, 253);display:inline-block;font-weight:400;line-height:30px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(13, 110, 253);transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div> <button type="button" data-bs-target="#myCarousel" data-bs-slide="prev" style="left:0px;position:absolute;top:0px;bottom:0px;z-index:1;display:flex;align-items:center;justify-content:center;width: 15%;padding:0px;color:rgb(255, 255, 255);text-align:center;background:rgba(0, 0, 0, 0) none repeat scroll 0px 0px / auto padding-box border-box;border:0px none rgb(255, 255, 255);opacity:0.5;transition:opacity 0.15s ease 0s;cursor:pointer;appearance:button;text-transform:none;margin:0px;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:16px;line-height:24px;border-radius:0px;box-sizing:border-box;">
                <span aria-hidden="true" style="background-image:url('data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e');display:block;width: 2rem;height:32px;background-repeat:no-repeat;background-position:50% 50%;background-size:100% 100%;box-sizing:border-box;"></span> <span style="position:absolute;width: 1px !important;height:1px;padding:0px;margin:-1px;overflow:hidden;clip:rect(0px, 0px, 0px, 0px);white-space:nowrap;border:0px none rgb(255, 255, 255);box-sizing:border-box;">Previous</span> </button> <button type="button" data-bs-target="#myCarousel" data-bs-slide="next" style="right:0px;position:absolute;top:0px;bottom:0px;z-index:1;display:flex;align-items:center;justify-content:center;width: 15%;padding:0px;color:rgb(255, 255, 255);text-align:center;background:rgba(0, 0, 0, 0) none repeat scroll 0px 0px / auto padding-box border-box;border:0px none rgb(255, 255, 255);opacity:0.5;transition:opacity 0.15s ease 0s;cursor:pointer;appearance:button;text-transform:none;margin:0px;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:16px;line-height:24px;border-radius:0px;box-sizing:border-box;">
                <span aria-hidden="true" style="background-image:url('data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e');display:block;width: 2rem;height:32px;background-repeat:no-repeat;background-position:50% 50%;background-size:100% 100%;box-sizing:border-box;"></span> <span style="position:absolute;width: 1px !important;height:1px;padding:0px;margin:-1px;overflow:hidden;clip:rect(0px, 0px, 0px, 0px);white-space:nowrap;border:0px none rgb(255, 255, 255);box-sizing:border-box;">Next</span> </button>
        </div>
        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div style="max-width:1320px;width: 100%;padding-right:12px;padding-left:12px;margin-right: auto;margin-left: auto;box-sizing:border-box;">

            <!-- Three columns of text below the carousel -->
            <div style="--bs-gutter-x: 1.5rem;--bs-gutter-y: 0;display:flex;flex-wrap:wrap;margin-top:0px;margin-right:-12px;margin-left:-12px;box-sizing:border-box;">
                <div style="flex: 0 0 auto;width: 33.3333%;margin-bottom:24px;text-align:center;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false" style="border-radius:50%;vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#777" dy=".3em" style="box-sizing:border-box;">140x140</text>
                    </svg>
                    <h2 style="font-size:32px;font-weight:400;margin-top:0px;margin-bottom:8px;line-height:38.4px;box-sizing:border-box;">Heading</h2>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;"><a href="#" style="color:rgb(255, 255, 255);background-color:rgb(108, 117, 125);border-color:rgb(108, 117, 125);display:inline-block;font-weight:400;line-height:24px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(108, 117, 125);padding:6px 12px;font-size:16px;border-radius:4px;transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div style="flex: 0 0 auto;width: 33.3333%;margin-bottom:24px;text-align:center;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false" style="border-radius:50%;vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#777" dy=".3em" style="box-sizing:border-box;">140x140</text>
                    </svg>
                    <h2 style="font-size:32px;font-weight:400;margin-top:0px;margin-bottom:8px;line-height:38.4px;box-sizing:border-box;">Heading</h2>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;"><a href="#" style="color:rgb(255, 255, 255);background-color:rgb(108, 117, 125);border-color:rgb(108, 117, 125);display:inline-block;font-weight:400;line-height:24px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(108, 117, 125);padding:6px 12px;font-size:16px;border-radius:4px;transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div style="flex: 0 0 auto;width: 33.3333%;margin-bottom:24px;text-align:center;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false" style="border-radius:50%;vertical-align:middle;box-sizing:border-box;font-size:18px;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#777" dy=".3em" style="box-sizing:border-box;">140x140</text>
                    </svg>
                    <h2 style="font-size:32px;font-weight:400;margin-top:0px;margin-bottom:8px;line-height:38.4px;box-sizing:border-box;">Heading</h2>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">And lastly this, the third column of representative placeholder content.</p>
                    <p style="margin-right:12px;margin-left:12px;margin-top:0px;margin-bottom:16px;box-sizing:border-box;"><a href="#" style="color:rgb(255, 255, 255);background-color:rgb(108, 117, 125);border-color:rgb(108, 117, 125);display:inline-block;font-weight:400;line-height:24px;text-align:center;text-decoration:none solid rgb(255, 255, 255);vertical-align:middle;cursor:pointer;user-select:none;border:1px solid rgb(108, 117, 125);padding:6px 12px;font-size:16px;border-radius:4px;transition:color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;box-sizing:border-box;">View details »</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <!-- START THE FEATURETTES -->
            <hr style="margin:80px 0px;height:1px;color:rgb(90, 90, 90);background-color:rgb(90, 90, 90);border:0px none rgb(90, 90, 90);opacity:0.25;box-sizing:border-box;" />
            <div style="--bs-gutter-x: 1.5rem;--bs-gutter-y: 0;display:flex;flex-wrap:wrap;margin-top:0px;margin-right:-12px;margin-left:-12px;box-sizing:border-box;">
                <div style="flex: 0 0 auto;width: 58.3333%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <h2 style="margin-top:112px;font-size:50px;font-weight:400;line-height:50px;letter-spacing:-0.8px;margin-bottom:8px;box-sizing:border-box;">First featurette heading. <span style="color:rgb(108, 117, 125);box-sizing:border-box;">It’ll blow your mind.</span></h2>
                    <p style="font-size:20px;font-weight:300;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                </div>
                <div style="flex: 0 0 auto;width: 41.6667%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" style="font-size:56px;margin-right: auto !important;margin-left: auto !important;max-width:100%;height: auto;vertical-align:middle;box-sizing:border-box;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em" style="box-sizing:border-box;">500x500</text>
                    </svg>
                </div>
            </div>
            <hr style="margin:80px 0px;height:1px;color:rgb(90, 90, 90);background-color:rgb(90, 90, 90);border:0px none rgb(90, 90, 90);opacity:0.25;box-sizing:border-box;" />
            <div style="--bs-gutter-x: 1.5rem;--bs-gutter-y: 0;display:flex;flex-wrap:wrap;margin-top:0px;margin-right:-12px;margin-left:-12px;box-sizing:border-box;">
                <div style="order:2;flex: 0 0 auto;width: 58.3333%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <h2 style="margin-top:112px;font-size:50px;font-weight:400;line-height:50px;letter-spacing:-0.8px;margin-bottom:8px;box-sizing:border-box;">Oh yeah, it’s that good. <span style="color:rgb(108, 117, 125);box-sizing:border-box;">See for yourself.</span></h2>
                    <p style="font-size:20px;font-weight:300;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
                </div>
                <div style="order:1;flex: 0 0 auto;width: 41.6667%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" style="font-size:56px;margin-right: auto !important;margin-left: auto !important;max-width:100%;height: auto;vertical-align:middle;box-sizing:border-box;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em" style="box-sizing:border-box;">500x500</text>
                    </svg>
                </div>
            </div>
            <hr style="margin:80px 0px;height:1px;color:rgb(90, 90, 90);background-color:rgb(90, 90, 90);border:0px none rgb(90, 90, 90);opacity:0.25;box-sizing:border-box;" />
            <div style="--bs-gutter-x: 1.5rem;--bs-gutter-y: 0;display:flex;flex-wrap:wrap;margin-top:0px;margin-right:-12px;margin-left:-12px;box-sizing:border-box;">
                <div style="flex: 0 0 auto;width: 58.3333%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <h2 style="margin-top:112px;font-size:50px;font-weight:400;line-height:50px;letter-spacing:-0.8px;margin-bottom:8px;box-sizing:border-box;">And lastly, this one. <span style="color:rgb(108, 117, 125);box-sizing:border-box;">Checkmate.</span></h2>
                    <p style="font-size:20px;font-weight:300;margin-top:0px;margin-bottom:16px;box-sizing:border-box;">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div style="flex: 0 0 auto;width: 41.6667%;flex-shrink:0;max-width:100%;padding-right:12px;padding-left:12px;margin-top:0px;box-sizing:border-box;">
                    <svg width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" style="font-size:56px;margin-right: auto !important;margin-left: auto !important;max-width:100%;height: auto;vertical-align:middle;box-sizing:border-box;text-anchor:middle;user-select:none;">
                        <title style="box-sizing:border-box;">Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" style="box-sizing:border-box;"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em" style="box-sizing:border-box;">500x500</text>
                    </svg>
                </div>
            </div>
            <hr style="margin:80px 0px;height:1px;color:rgb(90, 90, 90);background-color:rgb(90, 90, 90);border:0px none rgb(90, 90, 90);opacity:0.25;box-sizing:border-box;" /> <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->
        <!-- FOOTER -->
        <footer style="max-width:1320px;width: 100%;padding-right:12px;padding-left:12px;margin-right: auto;margin-left: auto;box-sizing:border-box;">
            <p style="float:right;margin-top:0px;margin-bottom:16px;box-sizing:border-box;"><a href="#" style="color:rgb(13, 110, 253);text-decoration:underline solid rgb(13, 110, 253);box-sizing:border-box;">Back to top</a></p>
            <p style="margin-top:0px;margin-bottom:16px;box-sizing:border-box;">© 2017–2021 Company, Inc. · <a href="#" style="color:rgb(13, 110, 253);text-decoration:underline solid rgb(13, 110, 253);box-sizing:border-box;">Privacy</a> · <a href="#" style="color:rgb(13, 110, 253);text-decoration:underline solid rgb(13, 110, 253);box-sizing:border-box;">Terms</a></p>
        </footer>
    <button id="ocorrencia">Nova Ocorrencia</button>
    <button id="listar">Listar Ocorrencias</button>
    <button id="ed_perfil">Editar Perfil</button>
</body>
<script src="../js/jquery.js"></script>
<script>
    $("#ocorrencia").on("click", function () {
        window.open("ocorrencia.php", "_self");
    });

    $("#listar").on("click", function () {
        window.open("../../index.html", "_self");
    });

</script>
</html>