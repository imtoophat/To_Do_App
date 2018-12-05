$(document).ready(function(e){

	var Stopwatch = function(elem, options) {
      
      var timer       = createTimer(),
         startButton = createButton("start", start),
         stopButton  = createButton("stop", stop),
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
       a.addEventListener("click", function(event) {
         handler();
         event.preventDefault();
       });
       return a;
      }
      
      function start() {
       if (!interval) {
         offset   = Date.now();
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
       timer.innerHTML = clock/1000; 
      }
      
      function delta() {
       var now = Date.now(),
           d   = now - offset;
       
       offset = now;
       return d;
      }
      
      // public API
      this.start  = start;
      this.stop   = stop;
      this.reset  = reset;
      };

    // basic examples
    var elems = document.getElementsByClassName("basic");
      
    for (var i=0, len=elems.length; i<len; i++) {
      new Stopwatch(elems[i]);
    }

    var nextToDo = 1;
    var nextTag = 1;

	var maxItems = 5;
	var x = 1;

	function updateToDoStuff(){
		nextToDo++;
		nextTag++;
	}

	$('#add').click( function(e){

		var html = `<div class="to_do" id="to_do_${nextToDo}">

		            <a href="#" id="remove">x</a>
		            To Do Item: <input type="text" name="todo_item"> 
		            Tag: <input type="text" name="tag_${nextTag}">
		            <div id="to_do_${nextToDo}_tag_${nextTag}" class="basic stopwatch"></div>
		               
	            </div>`;

		if(x <= maxItems){
				
			$('#to_do_container').append(html);
			x++;
			var elem = document.getElementById(`to_do_${nextToDo}_tag_${nextTag}`);
			var timer = new Stopwatch(elem);
			updateToDoStuff();
			
		}
	});

	$('#to_do_container').on('click','#remove',function(e){

		$(this).parent('div').remove();
		x--;
	});


});