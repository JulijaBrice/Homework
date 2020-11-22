var inputs = document.querySelectorAll("input[type='checkbox']");
for(var i = 0; i < inputs.length; i++) { 
    inputs[i].addEventListener( 'change', function() {
      var form_id_selector = 'modify_form_'+ this.attributes["task_id"].value;
      var form = document.getElementById(form_id_selector);
      var state_hidden_input = form.elements[1];
      if (this.checked){
        state_hidden_input.value = 1
      }
      else{
        state_hidden_input.value = 0
      }
      form.submit()
  }); 
}