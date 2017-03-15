@extends('layout')

@section('content')
<div class="history-games-block">
    <div class="history-games-body gray-skin">
        <div class="pageTitle">Стоимость моего инвентаря - <span><span id="totalPrice"></span>0 рублей</span></div>
        <table style="width: 100%;">
            <thead style="display: table-header-group;">
            <tr style="color: #89B9D0;text-transform: uppercase;font-weight: 100;height: 45px;font-size: 17px;font-weight: 100;">
                <td style="width: 50px;"></td>
                <td style="padding: 5px 0px;">Название</td>
                <td style="padding: 5px 0px;">Тип</td>
                <td style="padding: 5px 0px;">Цена (РУБ)</td>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div> <!-- .history-games-body -->
</div> <!-- .history-games-block -->
<script>
    $(function(){
        loadMyInventory()
    });
</script>
@endsection