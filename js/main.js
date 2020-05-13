    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
    var instance = M.Dropdown.getInstance(elem)
    elems.addEventListener('click', function(e){
        console.log('mes couilles');
        
        // instance.open()
    })

