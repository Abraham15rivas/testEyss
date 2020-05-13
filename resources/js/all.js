document.addEventListener('DOMContentLoaded', function() {
    
    axios.get('/api/categories')
    .then( response => {
        let data = response.data
        data.forEach(category);
    });

    function category(item, index) 
    {
        var table = 
            `<tr> 
                <td>${index + 1}</td>
                <td class="text-left"><p>${item.name}</p></td>
                <td class="text-left"><p>${item.description}</p></td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="showProducts(${item.id});">Ver productos</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Category" onclick="editCategory(${item.id});">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCategory(${item.id});">Eliminar</button>
                </td>
            </tr>`
            
        document.getElementById('category_tb').innerHTML += table;
    }

});