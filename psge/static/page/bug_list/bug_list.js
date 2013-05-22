$(function(){

  function getHtml(data){

       var html = '' +
           '<tr bgcolor="#2185ff" style="color:#fff">' +
           '<td width="5%">序号</td>' +
           '<td width="30%">bug描述</td>' +
           '<td width="35%">详细描述</td>' +
           '<td width="10%">Resolution</td>' +
           '<td width="10%">RD</td>' +
           '<td width="10%">QA</td>' +
           '</tr>',
           index = 1,
           detail = "";

      $.each(data,function(key,bugItem){

          html+= ""+
              "<tr>" +
              "<td>" +index+
              "</td>" +
              "<td>" +(bugItem.summary)+
              "</td>" +
              "<td>" +bugItem.detail+
              "</td>" +
              "<td>" +bugItem.resolution+
              "</td>" +
              "<td>" +bugItem.assignedto+
              "</td>" +
              "<td>" +bugItem.loggedby+
              "</td>" +
              "</tr>";
          index++;
      });
      console.log(html);
       return html;
  }

  $("#doStatistic").on("click",function(){

      if($("#startTime").val()=="" || $("#endTime").val()==""){
          alert("开始时间或者结束时间不能为空");
          return;
      }
      $(".loading").css("display","block");
      $.get("../control/BugListController.php",{
          project:$("#project").val(),
          startTime:$("#startTime").val(),
          endTime:$("#endTime").val(),
          rsolution:$("#rsolution").val()
      },function(data,textStatus){
          $(".loading").css("display","none");
          $(".bug_result").children().eq(0).children().remove();
          $(".bug_result").children().eq(0).append(getHtml(data));
      },"json");
  })

    var start_datepicker = new magic.setup.datePicker('startTime', {
        'format': 'yyyy/MM/dd',
        'popupOptions': {
            offsetY: 1
        },
        'calendarOptions': {
            'weekStart': 'sun',
            'initDate': new Date()
        }
    });

    var end_datepicker = new magic.setup.datePicker('endTime', {
        'format': 'yyyy/MM/dd',
        'popupOptions': {
            offsetY: 1
        },
        'calendarOptions': {
            'weekStart': 'sun',
            'initDate': new Date()
        }
    });

});