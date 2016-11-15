<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
  <script type="text/javascript">
 layer.msg('好不好', {
  icon: 6,
  time: 1000 //2秒关闭（如果不配置，默认是3秒）
})
  </script>   
  <?php

  $ab = Session::get('MessagesStatus');
  echo $ab;
  ?>  

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">我在测试</div>
            </div>
        </div>
    </body>
</html>
