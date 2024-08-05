<style>
    .underline-kurenai {
        text-decoration: underline;
        text-decoration-color: #BC002D;
    }


    /* Highlight today's date */
    .today {
        background-color: #FFDDC1;
    }


    h5 {
        font-size: 20px;
    }
</style>


<div class="p-5" style="width: 360px;">

    <h3 class="mb-4 text-center fs-5"><a href="#" class="text-decoration-none">&lt;</a><span class="mx-3">2023年 11月</span><a href="#" class="text-decoration-none">&gt;</a></h3>
    <table class="table table-bordered text-center">
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
        </tr>
        <tr>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
        </tr>
        <tr>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td class="today">16</td>
            <td>17</td>
            <td>18</td>
        </tr>
        <tr>
            <td>19</td>
            <td>20</td>
            <td>21</td>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
        </tr>
        <tr>
            <td>26</td>
            <td>27</td>
            <td>28</td>
            <td>29</td>
            <td>30</td>
            <td></td>
            <td></td>
        </tr>
    </table>


    <div class="row text-center mb-1">
        <h5 class="text-bold underline-kurenai">Categories</h5>
    </div>

    <div class="row mb-3 px-5">
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
        </div>
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
        </div>
    </div>

    <div class="row px-5">
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('images/categories/3.png') }}" class="img-fluid">
        </div>
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('images/categories/4.png') }}" class="img-fluid">
        </div>
    </div>
</div>
