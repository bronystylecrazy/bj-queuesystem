<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.css">
    <style>
        /**  STYLE 11 */
        @font-face{
            font-family: Mitr;
            src: url("./fonts/Mitr-Medium.tff");
        }

        body{
            font-family: Mitr;
        }
        .style-11::-webkit-scrollbar-track {
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
        }
        
        .style-11::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: linear-gradient(left, #fff, #e4e4e4);
            border: 1px solid #aaa;
        }
        
        .style-11::-webkit-scrollbar-thumb:hover {
            background: #fff;
        }
        
        .style-11::-webkit-scrollbar-thumb:active {
            background: linear-gradient(left, #22ADD4, #1E98BA);
        }
        button{
            padding: 20px;
            font-size: 30px;
        }
        ::selection{
            background: none;
        }
    </style>
</head>

<body style="overflow: hidden;">
    <div class="p-2 text-center fixed-top" style="background: #1c4587;color: #ff9900;position: relative; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <h4 class="display-4"><b>โปรแกรมบัตรคิวรับสมัคร ม.1 และ ม.4</b></h4></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 p-0 text-center text-info" style="height: 100vh; background: #000000; ">
                <div class="w-100 p-2 text-left text-white" style="background: #0d0d0d; "><i class="fa fa-user-tie"></i> ขณะนี้กำลังดำเนินการ...</div>
                <div style="font-size: 150px;" id="m1_select"></div>
                <div class="w-100 p-2 text-left text-white"><i class="fa fa-arrow-circle-right"></i> คิวถัดไป</div>
                <div class="style-11 w-100 px-2">
                    <div id="m1_slot1" class="w-100  mt-2 p-0 text-info rounded" style="font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m1_slot2" class="w-100  mt-2 p-0 text-info rounded" style="opacity: .8; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m1_slot3" class="w-100  mt-2 p-0 text-info rounded" style="opacity: .6; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m1_slot4" class="w-100  mt-2 p-0 text-info rounded" style="opacity: .4; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m1_slot5" class="w-100  mt-2 p-0 text-info rounded" style="opacity: .2; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                </div>
            </div>
            <div class="col-4 p-0" style="height: 100vh;">
                <div class="row">
                    <div class="col-6 p-0 bg-info" style="height: 100vh;"></div>
                    <div class="col-6 p-0 bg-warning" style="height: 100vh;"></div>
                </div>
            </div>
            <div class="col-4 text-center text-warning" style="height: 100vh; background: #0d0d0d;">
            <div class="w-100 p-2 text-left text-white" style="background: #0d0d0d; "><i class="fa fa-user-tie"></i> ขณะนี้กำลังดำเนินการ...</div>
                <div style="font-size: 150px;" id="m4_select"></div>
                <div class="w-100 p-2 text-left text-white" style="background: #0d0d0d; "><i class="fa fa-arrow-circle-right"></i> คิวถัดไป</div>
                <div class="style-11 w-100 px-2">
                    <div id="m4_slot1" class="w-100  mt-2 p-0 text-warning rounded" style="font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m4_slot2" class="w-100  mt-2 p-0 text-warning rounded" style="opacity: .8; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m4_slot3" class="w-100  mt-2 p-0 text-warning rounded" style="opacity: .6; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m4_slot4" class="w-100  mt-2 p-0 text-warning rounded" style="opacity: .4; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                    <div id="m4_slot5" class="w-100  mt-2 p-0 text-warning rounded" style="opacity: .2; font-size: 75px;background: #1a1a1a; ">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom p-2" style="background: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <button id="m1reset" class="btn btn-danger btn-lg"><i class="fa fa-undo"></i> รีเซ็ต</button>
                    <button id="m1next" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-up"></i> คิวถัดไป</button>
                    <button id="m1prev" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-down"></i> คิวก่อนหน้า</button>
                    <button id="m1annouce" class="btn btn-success btn-lg"><i class="fa fa-bullhorn"></i> ประกาศ</button>
                </div>
                <div class="col-6 text-right">
                    <button id="m4reset" class="btn btn-danger btn-lg"><i class="fa fa-undo"></i> รีเซ็ต</button>
                    <button id="m4next" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-up"></i> คิวถัดไป</button>
                    <button id="m4prev" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-down"></i> คิวก่อนหน้า</button>
                    <button id="m4annouce" class="btn btn-success btn-lg"><i class="fa fa-bullhorn"></i> ประกาศ</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
    <script src="./frontend/socket.io.js"></script>
    <script src="queue.js"></script>
</body>
</html>