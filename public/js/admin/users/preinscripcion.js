( () => {
    
    ('#pais').on('change', onSelectChange);
} )();

function onSelectChange() {
    var pais_id = (this).val();
    alert(pais_id);
}
console.log('Maldita sea muestrate**************************************************');