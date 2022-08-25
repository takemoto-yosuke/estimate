  function sort() {
      (".sortable").sortable();
      (".sortable").disableSelection();
      ("#submit").click(function() {
          var result = (".sortable").sortable("toArray");
          ("#result").val(result);
          ("form").submit();
      });
  };