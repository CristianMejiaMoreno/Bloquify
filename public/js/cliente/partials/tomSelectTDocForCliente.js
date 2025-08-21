export async function tomSelectTDocumento(preselectedId = null)
{
    const select = document.getElementById('select-tdocumento');

    if(select.tomselect)
    {
        select.tomselect.destroy();
    }

    const url = APP_URL + '/admin/tipoDocumento/TomSelect';
    const response = await fetch(url);

    if(response.ok){
        const tdocumento = await response.json();

        const tom = new TomSelect("#select-tdocumento", {
            valueField: 'value',
            labelField: 'label',
            searchField: ['label'],
            options: tdocumento,
            sortField: {
                field: "label",
                direction: "asc"
            }
        });

        if(preselectedId){
            tom.setValue(preselectedId);
        }

        return tom;
    }


    const data = await response.json();
    console.log(data)
    
}