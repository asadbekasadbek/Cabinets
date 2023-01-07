<?php
//шаблон профиля

require_once 'layouts/head.php';
if (!$_SESSION['user']) {
    header('Location: /');
}
$connect= new \Models\ConnectDB();
$connect=$connect->connectDB();
$cabinets = new \Controllers\Cabinets();
$cabinets->freeCabinets($connect);
$cabinets->reservedCabinets($connect);


?>
<div style="display: flex; justify-content: end">
    <a  style="padding: 20px;background-color: #fff;border-radius: 1em;margin: 2px" href="/logout">logout</a>
</div>
<div style="display: flex;justify-content: center;" >
    <h1 style="color: red"><?php
         if( isset($_SESSION['free_cabinets_error'])){
           echo $_SESSION['free_cabinets_error'];
             unset($_SESSION['free_cabinets_error']);
         }
        ?></h1>
</div>
<div style="display: flex;justify-content: center;" >
    <h1 style="color: green"><?php
        if( isset($_SESSION['free_cabinets_success'])){
            echo $_SESSION['free_cabinets_success'];
            unset($_SESSION['free_cabinets_success']);
        }
        ?></h1>
</div>
<div class="body grid">


    <div style="display: flex;justify-content: center; margin: 0 5px ; text-align: center; flex-direction: column">
        <h1>таблица свободный кабинетов</h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-800">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Номер Кабинета
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    начало бронирования Кабинета
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    конец бронирования Кабинета
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    забронировать кабинет
                                </th>
                            </tr>
                            </thead class="border-b">
                            <tbody>

                             <?php foreach ($_SESSION['free_cabinets'] as $value) : ?>
                                 <tr class="bg-white border-b">
                                     <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><? echo $value['number_cabinet'] ?></td>
                                     <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                         <? echo $value['start_booking_cabinet'] ?>
                                     </td>
                                     <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                         <? echo $value['end_cabinet_booking'] ?>
                                     </td>
                                     <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                         <form  action="/send_message" method="post">
                                             <label>
                                                 <input name="cabinet_id" type="text" style="display: none"  value="<? echo $value['id'] ?>" >
                                             </label>
                                             <button type="submit" class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg p-2 transition duration-150 ease-in-out">забронировать</button>
                                        </form>
                                     </td>
                                 </tr class="bg-white border-b">
                             <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: flex;justify-content: center; margin: 0 5px ; text-align: center; flex-direction: column">
        <h1>таблица забронированных кабинетов</h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-800">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Номер Кабинета
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    начало бронирования Кабинета
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    конец бронирования Кабинета
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Имя человека который забронировал Кабинет
                                </th>
                            </tr>
                            </thead class="border-b">
                            <tbody>

                            <?php foreach ($_SESSION['reserved_сabinets'] as $value) : ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><? echo $value['number_cabinet'] ?></td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <? echo $value['start_booking_cabinet'] ?>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <? echo $value['end_cabinet_booking'] ?>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <?echo $value['user_name'] ?>
                                    </td>
                                </tr class="bg-white border-b">
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'layouts/footer.php';

?>
