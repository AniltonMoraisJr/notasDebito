app.controller('NotaController', NotaController);
function NotaController(){
    var vm = this;
    vm.despesas = [];
    vm.quilometragens = [];
    vm.totalDp = 0;
    vm.totalKm = 0;
    vm.adiantamento_valor = 0;

    vm.addQuilometragem = function addQuilometragem(quilometragen){
        var calculo_km = parseFloat(quilometragen.quilometragem_quantidade_km) * parseFloat(quilometragen.quilometragem_quantidade_km_valor);

        vm.totalKm = vm.totalKm + calculo_km;

        quilometragen.quilometragem_quantidade_km_total = calculo_km;

        vm.quilometragens.push(angular.copy(quilometragen));
        $('#quilometragens_list').val(angular.toJson(vm.quilometragens));

        // Adiciona uma despesa da KM

        var despesa = {
            'valor_despesa': calculo_km,
            'tipodespesa_id': 12,
            'tipo_despesa_codigo': '10112 Quilometragem'
        };
        

        vm.totalDp = vm.totalDp + parseFloat(despesa.valor_despesa);
        
        console.log(despesa);

        vm.despesas.push(despesa);
        
        console.log(vm.despesas);

        $('#despesas_list').val(angular.toJson(vm.despesas));
        //console.log(vm.quilometragens);
    };
    vm.addDespesa = function addDespesa(despesa){
        despesa.tipo_despesa_codigo = $('#tipodespesa_id').select2('data')[0].text;

        vm.totalDp = vm.totalDp + parseFloat(despesa.valor_despesa);

        vm.despesas.push(angular.copy(despesa));
        $('#despesas_list').val(angular.toJson(vm.despesas));
        
        console.log(vm.despesas);
        //console.log(vm.despesas);
    };
}