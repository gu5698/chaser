  $(document).ready(function () {
      $("#test").focus();
      $('body').click(function (e) {
          $("#test").focus();
      });
      $('#closepiano').click(function () {
          $("#test").val("");
          $('#all').hide();
      });
      $("#test").keyup(function () {
          if ($(this).val().length >= 13) {
              if ($(this).val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key60').click(function () {
          $("#test").val($("#test").val() + "a");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key62').click(function () {
          $("#test").val($("#test").val() + "s");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key64').click(function () {
          $("#test").val($("#test").val() + "d");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key65').click(function () {
          $("#test").val($("#test").val() + "f");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key67').click(function () {
          $("#test").val($("#test").val() + "g");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key69').click(function () {
          $("#test").val($("#test").val() + "h");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key71').click(function () {
          $("#test").val($("#test").val() + "j");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key72').click(function () {
          $("#test").val($("#test").val() + "k");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key61').click(function () {
          $("#test").val($("#test").val() + "w");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key63').click(function () {
          $("#test").val($("#test").val() + "e");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key66').click(function () {
          $("#test").val($("#test").val() + "t");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key68').click(function () {
          $("#test").val($("#test").val() + "y");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });
      $('#key70').click(function () {
          $("#test").val($("#test").val() + "u");
          if ($("#test").val().length >= 13) {
              if ($("#test").val() == "gddfssasdfggg") {
                  verification();
              } else {
                  showSound("audio/x.mp3");
                  $("#test").val("");
                  $('#all').slideUp();
              }
          }
      });

      function showSound(audioSrc) {
          $("#hint").remove();
          let audioJQ = $("<audio src='" + audioSrc + "' autoplay id='hint' />");
          audioJQ.appendTo("body");
      }

      function verification() {
          TweenMax.to('.group', 2, {
              transform: 'rotateY(180deg)',
              ease: Linear.easeInOut,
              onStart: function () {
                  TweenMax.to('#gear1', 2, {
                      rotation: -720,
                      ease: Linear.easeInOut
                  })
                  TweenMax.to('#gear2', 2, {
                      rotation: 1080,
                      ease: Linear.easeInOut
                  })
                  TweenMax.to('#gear3', 2, {
                      rotation: -720,
                      ease: Linear.easeInOut
                  })
              },
          })
          $("#test").val("");
          $('#all').slideUp();
      }
  });