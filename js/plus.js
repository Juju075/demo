function toggle_div( btn, id_div )
{
  btn.innerHTML = (btn.innerHTML == '+')? '-' : '+';
  btn.title = (btn.title == 'Afficher la suite')? 'Masquer la suite' : 'Afficher la suite';
  document.getElementById( id_div ).style.display = (document.getElementById( id_div ).style.display == 'none')? 'block' : 'none';
}