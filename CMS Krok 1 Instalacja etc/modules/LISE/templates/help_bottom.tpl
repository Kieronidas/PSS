<script>
  $( document ).ready(function()
  {
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++)
    {
      acc[i].addEventListener("click", function()
      {
        this.classList.toggle("accactive");

        var panel = this.nextElementSibling;

        if (panel.style.maxHeight)
        {
          panel.style.maxHeight = null;
        }
        else
        {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      } );
    }
  } );
</script>