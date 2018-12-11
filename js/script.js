var maxItems = 5;
var x = 1;
$(document).ready(function (e) {

  var Stopwatch = function (elem, options) {

    var timer = createTimer(),
      startButton = createButton("start", start),
      stopButton = createButton("stop", stop),
      resetButton = createButton("reset", reset),
      offset,
      clock,
      interval;

    // default options
    options = options || {};
    options.delay = options.delay || 1;

    // append elements     
    elem.appendChild(timer);
    elem.appendChild(startButton);
    elem.appendChild(stopButton);
    elem.appendChild(resetButton);

    // initialize
    reset();

    // private functions
    function createTimer() {
      return document.createElement("span");
    }

    function createButton(action, handler) {
      var a = document.createElement("a");
      a.href = "#" + action;
      a.innerHTML = action;
      a.addEventListener("click", function (event) {
        handler();
        event.preventDefault();
      });
      return a;
    }

    function start() {
      if (!interval) {
        offset = Date.now();
        interval = setInterval(update, options.delay);
      }
    }

    function stop() {
      if (interval) {
        clearInterval(interval);
        interval = null;
      }
    }

    function reset() {
      clock = 0;
      render(0);
    }

    function update() {
      clock += delta();
      render();
    }

    function render() {
      timer.innerHTML = clock / 1000;
    }

    function delta() {
      var now = Date.now(),
        d = now - offset;

      offset = now;
      return d;
    }

    // public API
    this.start = start;
    this.stop = stop;
    this.reset = reset;
  };

  // basic examples
  var elems = document.getElementsByClassName("basic");

  for (var i = 0, len = elems.length; i < len; i++) {
    new Stopwatch(elems[i]);
  }


  //generating new response forms and appending to tracker portion
  // var results_html = document.getElementById('results_container');

  // $('.submit').click(function (e) {

  //   e.preventDefault();

  //   var name = document.getElementById(`item_name_${this.id}`).value;

  //   $.ajax({

  //     type: 'post',
  //     url: 'submit_to_do.php',
  //     data: 'name=' + name,
  //     success: function (html) {
  //       results_html = results_html + '</br>' + html;

  //       $('#results_container').html(results_html);

  //     }
  //   });

  //   return false;

  // });

    $('.submit').click(function (e) {

    e.preventDefault();

    });

  // generates unique IDs for each to do item and tag

  var nextToDo = 1;
  var nextTag = 1;


  
  function updateToDoStuff() {
    nextToDo++;
    nextTag++;
  }

  // add and remove to do item containers

  $('#add').click(function (e) {

    var html = `
            
            <div class="to_do" id="to_do_${nextToDo}">
              <form method='POST'>
                <a href="#" id="remove">x</a>
                To Do Item: <input type="text" id="item_name_${nextToDo}" name="todo_item_name"> 
                Tag: <input type="text" id="tag_${nextTag}" name="tag">
                <div id="to_do_${nextToDo}_tag_${nextTag}" class="basic stopwatch"></div>
                <input type="submit" id="${nextToDo}" name="to_do_item" onclick="return processItem(this.id);">
              </form>
            </div>
            `;

    if (x <= maxItems) {

      $('#to_do_container').append(html);
      x++;
      var elem = document.getElementById(`to_do_${nextToDo}_tag_${nextTag}`);
      var timer = new Stopwatch(elem, 1000000);
      updateToDoStuff();

    }
  });

  $(document).on('click', '#remove', function (e) {

    e.preventDefault();
    $(this).closest('.to_do').remove();
    x--;
  });


});