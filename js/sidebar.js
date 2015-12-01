var sidebar = document.getElementById("sidebar");
sidebar.addEventListener('mouseover', func1, false);
sidebar.addEventListener('mouseout', func2, false);

  function func1()
  {
    classie.add( sidebar, 'sidebar--open');
  }
  function func2()
  {
    classie.remove( sidebar, 'sidebar--open');
  }