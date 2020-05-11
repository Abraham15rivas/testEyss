<script>

    function show(id_category) 
    {
        axios.get('/api/products/search/'+id_category).then( response => {
            let data = response.data
            console.log(data)
            data.forEach(product);
        }).catch(e => {
            console.log(e);
        });
    }
  
    function update(id_category) 
    {
        console.log(id)
    }
  
    function deleteC(id_category) 
    {
        axios.delete('/api/categories/borrar/'+id_category).then( response => {
            let data = response.data
            
            var tb = document.getElementById('category_tb')
            padre = tb.parentNode;
            padre.removeChild(tb);

            data.forEach(category);

        }).catch(e => {
            console.log(e);
        });
    }

    function product(item, index) 
    {
        console.log(item.name)
        var table = 
            `<tr> 
                <td>${index + 1}</td>
                <td class="text-left"><p>${item.name}</p></td>
                <td class="text-left"><p>${item.description}</p></td>
                <td class="text-left"><p>${item.status == 1 ? 'Activo' : 'Desactivo'}</p></td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="show(${item.id});">Ver productos</button>
                    <button type="button" class="btn btn-success" onclick="update(${item.id});">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteC(${item.id});">Eliminar</button>
                </td>
            </tr>`
            
        document.getElementById('product_tb').innerHTML += table;
    }

    function category(item, index) 
    {   
        // let tb = document.createElement("tbody");
        // tb.setAttribute('id', 'category_tb')

        var table = 
            `<tr> 
                <td>${index + 1}</td>
                <td class="text-left"><p>${item.name}</p></td>
                <td class="text-left"><p>${item.description}</p></td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="show(${item.id});">Ver productos</button>
                    <button type="button" class="btn btn-success" onclick="update(${item.id});">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteC(${item.id});">Eliminar</button>
                </td>
            </tr>`
            
        document.getElementById('category_tb').innerHTML += table;
    }

</script>