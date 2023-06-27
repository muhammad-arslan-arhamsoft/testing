$(function ($) {
    "use strict";
  
 
    $("#ajaxEditForm").attr('onsubmit', 'return false');
    $("#ajaxEditFormOne").attr('onsubmit', 'return false');
    $("#ajaxEditFormTwo").attr('onsubmit', 'return false');
    $("#ajaxEditFormThree").attr('onsubmit', 'return false');
    $("#ajaxEditFormFour").attr('onsubmit', 'return false');
    $("#ajaxEditFormFive").attr('onsubmit', 'return false');
    $("#ajaxForm").attr('onsubmit', 'return false');
    $("#ajaxFormOne").attr('onsubmit', 'return false');
    $("#ajaxFormTwo").attr('onsubmit', 'return false');
    $("#ajaxFormThree").attr('onsubmit', 'return false');
    $("#ajaxFormFour").attr('onsubmit', 'return false');
    $("#ajaxFormFive").attr('onsubmit', 'return false');
    $("#ajaxFormSix").attr('onsubmit', 'return false');
    $("#ajaxFormSeven").attr('onsubmit', 'return false');
 
  
  
  
  
  
  
  

    $("#submitBtn").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxForm');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxForm").attr('action');
      let method = $("#ajaxForm").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('err' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
    // / **************************************************
    // ==========Form Submit with AJAX Request Start==========
    // ******************************************************/
    $("#submitBtnOne").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormOne');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormOne").attr('action');
      let method = $("#ajaxFormOne").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('erro' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
    // / **************************************************
    // ==========Form Submit with AJAX Request Start==========
    // ******************************************************/
    $("#submitBtnTwo").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormTwo');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormTwo").attr('action');
      let method = $("#ajaxFormTwo").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('errt' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
  
    // / **************************************************
    // ==========Form Submit with AJAX Request Start==========
    // ******************************************************/
    $("#submitBtnThree").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormThree');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormThree").attr('action');
      let method = $("#ajaxFormThree").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('errth' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
  
  
  
    // / **************************************************
    // ==========Form Submit with AJAX Request Start==========
    // ******************************************************/
    $("#submitBtnFour").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormFour');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormFour").attr('action');
      let method = $("#ajaxFormFour").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('errf' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
  
    // / **************************************************
    // ==========Form Submit with AJAX Request Start==========
    // ******************************************************/
    $("#submitBtnFive").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormFive');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormFive").attr('action');
      let method = $("#ajaxFormFive").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('errfi' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
    $("#submitBtnSeven").on('click', function (e) {
      $(e.target).attr('disabled', true);
  
      $(".request-loader").addClass("show");
  
      let ajaxForm = document.getElementById('ajaxFormSeven');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxFormSeven").attr('action');
      let method = $("#ajaxFormSeven").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
         
  
          $(e.target).attr('disabled', false);
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('errse' + x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
  
  
  
  
  
  
  
  
  
  
    // / **************************************************
    // ==========Form Prepopulate After Clicking Edit Button End==========
    // ******************************************************/
  
    // / **************************************************
    // ==========Form One Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtnTwo").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditFormTwo');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditFormTwo").attr('action');
      let method = $("#ajaxEditFormTwo").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('eterr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
  
  
    // / **************************************************
    // ==========Form One Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtnThree").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditFormThree');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditFormThree").attr('action');
      let method = $("#ajaxEditFormThree").attr('method');
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('etherr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
  
  
    // / **************************************************
    // ==========Form One Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtnFour").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditFormFour');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditFormFour").attr('action');
      let method = $("#ajaxEditFormFour").attr('method');
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('eferr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
  
    // / **************************************************
    // ==========Form One Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtnFive").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditFormFive');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditFormFive").attr('action');
      let method = $("#ajaxEditFormFive").attr('method');
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('efierr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
  
  
  
    // / **************************************************
    // ==========Form One Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtnOne").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditFormOne');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditFormOne").attr('action');
      let method = $("#ajaxEditFormOne").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('eoerr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
  
  
    // / **************************************************
    // ==========Form Update with AJAX Request Start==========
    // ******************************************************/
    $("#updateBtn").on('click', function (e) {
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
  
      let ajaxEditForm = document.getElementById('ajaxEditForm');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditForm").attr('action');
      let method = $("#ajaxEditForm").attr('method');
  
  
      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          //
  
          $(".request-loader").removeClass("show");
  
          $(".em").each(function () {
            $(this).html('');
          })
  
          if (data == "success") {
            location.reload();
          }
  
          // if error occurs
          else if (typeof data.error != 'undefined') {
            for (let x in data) {
             
              if (x == 'error') {
                continue;
              }
              document.getElementById('eerr' + x).innerHTML = data[x][0];
              $(e.target).attr('disabled', false);
            }
          }
        }
      });
    });
    // / **************************************************
    // ==========Form Update with AJAX Request End==========
    // ******************************************************/
  
  });
   