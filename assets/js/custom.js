(function($){
 var base_url = "http://localhost/Notekeeping/";
 $(document).ready(function() {
     $('.note-inner-box').click(function(){
        var noteid = $(this).closest('.note-box').data('noteid');
        getcontent(noteid);
        $('#myModal').modal();
     });
     $('.note-icon-link').click(function(){
       $('#exampleModal').modal();
     });
     $('.newnotesavebtn').click(function(){
       savecontent();
     });
     $('#login-btn').click(function(){
       $('#loginform').submit();
     });
     $('.editnotesavebtn').click(function(){
       var noteid = $(this).closest('#myModal').data('note_id');
       updatecontent(noteid);
       
     });
     $('.note-share').click(function(){
       var noteid=$(this).closest('.note-box').data('noteid');
       $("#sharemodal").attr('data-noteid',noteid);
       $('#sharemodal').modal();
     });

     $('.sharebtn').click(function(){
       var userid= $('#hidden-user-input').val();
       var permission = $('input[name=permission]:checked').val();
       var noteid = $('#sharemodal').data('noteid');
       sharenote(userid,permission,noteid);
     });

 });

  var sharenote = function(userid,permission,noteid){
        $.ajax({
          type:"post",
          url:base_url+"view/sharenote",
          data:{noteid:noteid,userid:userid,permission:permission},
          success:function(response){
            console.log(response);
            location.reload();
            //$('#newform')[0].reset();
            //$('#exampleModal').modal('hide');
          }
        });
  }
 
  var getcontent = function(noteid){
   
    
    $.ajax({
       type:"post",
       url:base_url+"view/ajaxresponse",
       data:{noteid:noteid},
       dataType:"json",
       success:function(response){
         console.log("response is"+response);
         $('.edit-model-body #title-name-edit').val(response.note_title);
         $('.edit-model-body #message-text-edit').val(response.note_content);
         $('#tags-input-edit').tagsinput('add', response.note_tags);
         $('#myModal').attr('data-noteid',response.note_id);
         
       }
    });
      
  }

  var savecontent = function(){
    var notetitle = $('#title-name').val();
    var notetext = $('#message-text').val();
    var notetags= $('#tags-input').val();
    
    var userid = $('.user-icon').data('user-id');
   $.ajax({
      type:"post",
      url:base_url+"view/insertnote",
      data:{notetext:notetext,notetitle:notetitle,notetags:notetags,userid:userid},
      success:function(response){
        console.log(response);
        location.reload();
        //$('#newform')[0].reset();
        //$('#exampleModal').modal('hide');
      }
    });
  }

  var updatecontent = function(noteid){
    var notetitle = $('#title-name-edit').val();
    var notetext = $('#message-text-edit').val();
    var notetags = $('#tags-input-edit').val();
    var noteid = $('#myModal').data('noteid');
    $.ajax({
      type:"post",
      url:base_url+"view/updatecontent",
      data:{notetext:notetext,notetitle:notetitle,notetags:notetags,noteid:noteid},
      success:function(response){
        console.log(response);
        location.reload();
      }
    });
  }

var countries = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
    url: base_url+'view/getusers',
    cache:false,
    filter: function(list) {
      
      return $.map(list, function(name) {
      
      return { name: name.useremail,id:name.userid }; });
    }
    }
  });
  countries.initialize();



 $('.shareuserinput').typeahead(null, {
  name: 'countries',
  displayKey: 'name',
  source: countries.ttAdapter()
});

 $('.shareuserinput').bind('typeahead:select', function(ev, suggestion) {
   $('#hidden-user-input').val(suggestion.id);

});

})(jQuery);