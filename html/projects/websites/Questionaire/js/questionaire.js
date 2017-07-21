// global variable to hold total score
var total = 0;

// begin custom method to handle each answer
$.fn.answer = function() 
{
  this.click(onClick);
  function onClick() 
  {
    // get value from the clicked button and store in the varialble val
    var val = $(this).val();

    if (val == 1) 
    {
      total++;
      // ...change the color of the button from blue to green
      $(this).removeClass('btn-primary').addClass('btn-success').parent().find('button').unbind();
    }
    else 
    {
      // if val does not equal one, change button from blue to red
      $(this).removeClass('btn-primary').addClass('btn-danger').parent().find('button').unbind();
    };

  };
};
// end of answer method

$.fn.calcScore = function() 
{
  this.click(onClick);

  function onClick() 
  {
    if (total == 0) 
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">0% - F</p>');
    }
    else if (total == 1)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">10% - F</p>');
    }
    else if (total == 2)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">20% - F</p>');
    }
    else if (total == 3)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">30% - F</p>');
    }
    else if (total == 4)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">40% - F</p>');
    }
    else if (total == 5)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">50% - F</p>');
    }
    else if (total == 6)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">60% - D</p>');
    } 
    else if (total == 7)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">70% - C</p>');
    } 
    else if (total == 8)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">80% - B</p>');
    } 
    else if (total == 9)
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">90% - A</p>');
    }  
    else if (total == 10) 
    {
      $('.score').append('<p id="handwriting">' + total + ' out of 10</p> <p id="handwritingGrade">100% - A+</p>');
    };
    $(this).unbind();
  };
};
// end of calcScore method

// call answer method on each question
$('.question-button').answer();

// call calcScore method on score button
$('.scoreButton').calcScore();