var socket = io("http://localhost:3000"); /** COMMUNICATE WAY (  PORT 3000 )*/
var selectedID = 0;
window.onload = socket.emit("queueView",'CONNECTED');
function register(alias){
    $.ajax({
        url: 'ajax/queue.php',
        method: 'POST',
        dataType: 'json',
        data: { ALIAS: alias },
        success: function(data){
            selectedID = ( typeof data[0] != "undefined") ? data[0].ID : data[data.length-1];
            $('#'+alias+'_select').text(( typeof data[0] != "undefined") ? data[0].ID : '--' );
            $('#'+alias+'_slot1').text( ( typeof data[1] != "undefined") ? data[1].ID : '' );
            $('#'+alias+'_slot2').text( ( typeof data[2] != "undefined") ? data[2].ID : '' );
            $('#'+alias+'_slot3').text( ( typeof data[3] != "undefined") ? data[3].ID : '' );
            $('#'+alias+'_slot4').text( ( typeof data[4] != "undefined") ? data[4].ID : '' );
            $('#'+alias+'_slot5').text( ( typeof data[5] != "undefined") ? data[5].ID : '' );
            console.log(data);
        }
    });
}
register("m1");
register("m4");

setInterval(function(){
    register("m1");
    register("m4");
},3000);


$('#m1next').click(function(){
    $.ajax({
        url: 'ajax/update.php',
        method: 'POST',
        data: { ID: $('#m1_select').text() , ALIAS: 'm1' , DO: 1},
        success: function(data){
            console.log(data);
            register("m1");
        }
    });
});

$('#m1prev').click(function(){
    $.ajax({
        url: 'ajax/update.php',
        method: 'POST',
        data: { ID: $('#m1_select').text(), ALIAS: 'm1' , DO: 0},
        success: function(data){
            console.log(data);
            register("m1");
        }
    });
});

$('#m4next').click(function(){
    $.ajax({
        url: 'ajax/update.php',
        method: 'POST',
        data: { ID: $('#m4_select').text() , ALIAS: 'm4' , DO: 1},
        success: function(data){
            console.log(data);
            register("m4");
        }
    });
});

$('#m4prev').click(function(){
    $.ajax({
        url: 'ajax/update.php',
        method: 'POST',
        data: { ID: $('#m4_select').text(), ALIAS: 'm4' , DO: 0},
        success: function(data){
            console.log(data);
            register("m4");
        }
    });
});
$('#m1reset').click(function(){
    reset("m1");
});
$('#m4reset').click(function(){
    reset("m4");
});
$('#m1annouce').click(function(){
    Call("b"+$('#m1_select').text());

});

$('#m4annouce').click(function(){
    Call("y"+$('#m4_select').text());
});

/**  CALLING FUNCTION  */
function Call(words){
    socket.emit("queue",words);
    let wait = 800;
    let j = 0;
    $('#m1annouce,#m4annouce').attr("disabled","disabled");
    setTimeout(function(){
        var audio = new Audio("sound/"+words[0]+".mp3");
        audio.play();
    },1 * wait);
    setTimeout(function(){
        var audio = new Audio("sound/"+words[1]+".mp3");
        audio.play();
    },5 * wait);
    setTimeout(function(){
        var audio = new Audio("sound/"+words[2]+".mp3");
        audio.play();
    },6 * wait);
    setTimeout(function(){
        var audio = new Audio("sound/"+words[3]+".mp3");
        audio.play();
    },7 * wait);
    setTimeout(function(){
        $('#m1annouce,#m4annouce').removeAttr("disabled");
        var audio = new Audio("sound/"+words[4]+".mp3");
        audio.play();
    },8 * wait);
}

function reset(alias){
    Swal.fire({
        title: 'สอบถามการยืนยันครั้งที่ 1',
        text: "ต้องการที่จะรีเซ็ตฐานข้อมูลนี้หรือไม่!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่ รีเซ็ตเลย!'
      }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'สอบถามการยืนยันครั้งที่ 2',
                text: "กระบวนการนี้จะไม่สามารถย้อนกลับได้นะ!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ รีเซ็ตเลย!'
              }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: 'ajax/reset.php',
                        method: 'POST',
                        data: { ALIAS: alias},
                        success: function(data){
                            Swal.fire(
                                'เรียบร้อย!',
                                'ข้อมูลทั้งหมดถูกลบไปแล้ว!',
                                'success'
                            )
                            register($alias);
                        }
                    });
                }
            })
        }
      })
}

