<?php

class Notification {

    public static function showNotification($bericht, $time = 3) {
        echo "<style>
        @keyframes notificationAnimation {
            0% {opacity: 0;}
            10% {opacity: 10%;}
            20% {opacity: 20%;}
            30% {opacity: 30%;}
            40% {opacity: 40%;}
            50% {opacity: 50%;}
            60% {opacity: 60%;}
            70% {opacity: 70%;}
            80% {opacity: 80%;}
            90% {opacity: 90%;}
            100% {opacity: 100%;}
          }
          @keyframes notificationAnimationNotVisible {
            0% {opacity: 85%;}
            100% {opacity: 0;}
          }
      
          #notification {
            position: absolute;
            width: 450px;
            height: 120px;
            right: 10px;
            background-color: #99ff99;
            text-align: center;
            color: black;
            animation-name: notificationAnimation;
            animation-duration: 1s;
            animation-iteration-count: 1;
            border-radius: 15px;
          }
          .not-visible {
            visibility: hidden !important;
            animation-name: notificationAnimationNotVisible;
            animation-duration: 1s;
            animation-iteration-count: 1;
            
          }

        </style>";

        echo "<div id='notification'>";
        echo "<p><strong>Notificatie</strong></p>";
        echo "<p class='notification-content' style='padding-top: 1px;'>$bericht</p>";
        echo "</div>";
        echo "<script>
        var timeleft = 3;
        var noti = document.getElementById('notification');
        var notiTimer = setInterval(function(){
            if(timeleft <= 0) {
                noti.innerHTML = 'wtf';
                noti.classList.add('not-visible');
                clearInterval(notiTimer);
            }
            
            timeleft -= 1;
        }, 1000);
        </script>";
    }
}