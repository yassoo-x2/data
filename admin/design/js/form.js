/* global $ , jQuery , confirm , selected */
$(function () {
  'use strict';
  /// add input div t form
  function cloneDiv(targetSelector, text) {
    var target = $(targetSelector); // Select target container
    var clonedDiv = $('.text-div').first().clone(); // Clone the div
    var count = $('.form > .text-div').length; // Get the number of cloned divs
    clonedDiv.removeClass('d-none'); // Remove d-none to make it visible
    clonedDiv.find('input').attr('placeholder', text); // Update the <span> text
    clonedDiv.attr('id', 'ques' + count); // Update the div name
    clonedDiv.find('input').attr('name', 'input' + count); // Update the input name
    clonedDiv.find('input').attr('id', 'input' + count); // Update the input name

    // Loop over all cloned .text-div elements to get input values
    $('.text-div .label').each(function () {
      var optionValue = $(this).val();
      var optionid = $(this).attr('id');
      if (optionValue) {
        clonedDiv.find('.relevent').append('<option value="' + optionid + '">' + optionValue + '</option>');
      }
    });

    target.append(clonedDiv); // Append to the target container
    return clonedDiv; // Return the cloned element for further modification

  }


  function clonelist(targetSelector, text) {
    var target = $(targetSelector); // Select target container
    var clonedDiv = $('.choise').first().clone(); // Clone the div
    var count = $('.list > .choise').length; // Get the number of cloned divs
    clonedDiv.removeClass('d-none'); // Remove d-none to make it visible
    clonedDiv.addClass('d-flex justify-content-between');
    clonedDiv.find('input').attr('name', 'choise' + count); // Update the input name
    target.append(clonedDiv); // Append to the target container
    return clonedDiv; // Return the cloned element for further modification

  }

  $(document).on('change', '.relevent', function () {
    var selectedrelevent = $(this); // Get the selected value
    var selected = $(this).val(); // Get the selected value
    var inputtype = $('.form').find('#' + selected).attr('placeholder'); // Get the input type
    console.log($('.form').find('#' + selected).closest('.text-div').find('.list').find('.choise'));
    if (inputtype === 'Select One' || inputtype === 'Select Multiple') {
      selectedrelevent.closest('.relevent_content').append('<select class="form-control relev_opt" name="relevent' + selected + '"></select>');
      $('.form').find('#' + selected).closest('.text-div').find('.list').find('.choise').each(function () {
        var optionValue = $(this).find('input').val();
        selectedrelevent.closest('.relevent_content').find('.relev_opt').append('<option value="' + optionValue + '">' + optionValue + '</option>');  // Append the option to the select
      });

    } else {
      selectedrelevent.closest('.relevent_content').append('<input type=text class="form-control" name="relevent' + selected + '">');  // Append the input to the div
    }
  });




  $('.text-input').on('click', function () {
    cloneDiv('.form', 'Text'); // Call function with parameters
  });

  $('.number-input').on('click', function () {
    cloneDiv('.form', 'Number'); // Call function with parameters
  });

  $('.date-input').on('click', function () {
    cloneDiv('.form', 'Date'); // Call function with parameters
  });

  $('.selectone-input').on('click', function () {
    var newdiv = cloneDiv('.form', 'Select One'); // Call function with parameters
    var countselectone = $('.addchoise').length;
    newdiv.append('<button class="addchoise btn btn-success mt-1 mb-1"><i class="fa-solid fa-plus"></i></button>');
    newdiv.append('<div class=list  id=list' + countselectone + '  ></div>');

    $('.addchoise').on('click', function () {
      clonelist($(this).closest('.text-div').find('.list').first(), 'Option');
      // Delete button functionality
      $('.deletechoise').on('click', function () {
        $(this).closest('.choise').remove(); // Remove the cloned div
      });

    });
  });

  $('.selectmultiple-input').on('click', function () {
    var newdiv = cloneDiv('.form', 'Select Multiple'); // Call function with parameters
    var countselectmult = $('.addchoise').length;
    newdiv.append('<button class="addchoise btn btn-success mt-1 mb-1"><i class="fa-solid fa-plus"></i></button>');
    newdiv.append('<div class=list id= list' + countselectmult + '  ></div>');

    $('.addchoise').on('click', function () {
      clonelist($(this).closest('.text-div').find('.list').first(), 'Option');
      // Delete button functionality
      $('.deletechoise').on('click', function () {
        $(this).closest('.choise').remove(); // Remove the cloned div
      });

    });
  });




});










