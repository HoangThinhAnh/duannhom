<?php

class thongkeController
{

    public $modelThongke;

    public function __construct()
    {
        $this->modelThongke = new AmdinThongke();
    }


    // public function home()
    // {
    //     // Lấy số lượng đơn hàng, doanh thu và lợi nhuận
    //     $orders = $this->modelThongke->getSoLuongDonHang();
    //     $revenue = $this->modelThongke->getRevenue();
    //     $profit = $this->modelThongke->getProfit();

    //     // Truyền dữ liệu vào view
    //     $data = [

    //         'orders' => $orders,  // Số lượng đơn hàng
    //         'revenue' => $revenue, // Doanh thu
    //         'profit' => $profit,  // Lợi nhuận
    //     ];;

    //     // Gọi view để hiển thị
    //     require_once 'views/thongke/list_thongke.php';
    // }


    public function home()
    {
        // Lấy số lượng đơn hàng, doanh thu và lợi nhuận
        $orders = $this->modelThongke->getSoLuongDonHang();
        $revenue = $this->modelThongke->getRevenue();
        $profit = $this->modelThongke->getProfit();

        // Lấy doanh thu theo ngày cho tháng hiện tại
        $startDate = date('Y-m-01');  // Ngày đầu tháng
        $endDate = date('Y-m-t');  // Ngày cuối tháng
        $revenueByDay = $this->modelThongke->getRevenueByDay($startDate, $endDate);

        // Tạo mảng doanh thu theo ngày
        $dailyRevenue = [];
        $currentDate = $startDate;
        while (strtotime($currentDate) <= strtotime($endDate)) {
            $dailyRevenue[$currentDate] = 0;  // Gán doanh thu mặc định là 0
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        foreach ($revenueByDay as $data) {
            $dailyRevenue[$data['day']] = (float)$data['revenue'];  // Gán doanh thu cho từng ngày
        }

        // Truyền dữ liệu vào view
        $data = [
            'orders' => $orders,  // Số lượng đơn hàng
            'revenue' => $revenue, // Doanh thu
            'profit' => $profit,  // Lợi nhuận
            'dailyRevenue' => $dailyRevenue, // Doanh thu theo ngày
        ];

        // Gọi view để hiển thị
        require_once 'views/thongke/list_thongke.php';
    }
}
