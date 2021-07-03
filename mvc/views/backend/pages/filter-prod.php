
    <div class="col-md-12 col-sm-12 ">
            <div class="row d-flex flex-row-reverse" >
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" class="form-control search" placeholder="Tìm kiếm theo tên sản phẩm...">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <select class="custom-select filter" id="inputGroupSelect01">
                                <option value="admin/listproduct/1" >Tất cả </option>
                                <?php foreach($data['cates'] as $cate){ ?>
                                <option value="admin/filter/<?php echo $cate['cate_id'] ?>/1"><?php echo  mb_convert_case($cate['cate_name'],MB_CASE_TITLE) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh Sách Sản Phẩm</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class = 'text-center text-success'>
                <?php
                    if(isset($_SESSION['mes'])){
                        echo $_SESSION['mes'];
                        unset($_SESSION['mes']);
                    }
                ?>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Tên </th>
                                <th class="column-title">Hình Ảnh </th>
                                <th class="column-title">Giá Tiền </th>
                                <th class="column-title">Giá Khuyễn Mãi </th>
                                <th class="column-title">Nổi Bật </th>
                                <th class="column-title">Hiển Thị </th>
                                <th class="column-title no-link last"><span class="nobr">Tùy Chọn</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="tboby">
                            <?php foreach($data['products'] as $product){ ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo mb_convert_case($product['product_name'],MB_CASE_TITLE) ?> </td>
                                <td class=" "> <img style="width:100px" src="public/backend/uploads/product/<?php echo $product['product_img'] ?>" alt=""> </td>
                                <td class=" "><?php echo number_format($product['product_price'])  ?> </td>
                                <td class=" "><?php echo number_format($product['product_promotion']) ?></td>
                                <?php if($product['product_featured']==1){ ?>
                                    <td class=" "> <a href="">Có </a></i></td>
                                <?php } else{?>
                                    <td class=" "> <a href="">Không </a></i></td>
                                <?php }?>

                                <?php if($product['product_status']==1){ ?>
                                    <td class=" "> <a href="admin/unactiveproduct/<?php echo $product['product_id'] ?>">Hiện <i class="far fa-thumbs-up"></i></a></i></td>
                                <?php } else{?>
                                    <td class=" "> <a href="admin/activeproduct/<?php echo $product['product_id'] ?>">Ẩn <i class="far fa-thumbs-down"></i> </a></i></td>
                                <?php }?>
                                
                                <td class=" last">
                                    <a href="admin/viewproduct/<?php echo $product['product_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-list-ul"></i></a>
                                    <a href="admin/editproduct/<?php echo $product['product_id'] ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                    <a  onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')" href="admin/deleteproduct/<?php echo $product['product_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                <li class="page-item"><a class="page-link" href="admin/filter/<?php echo $data['cate_id'] ?>/<?php echo $i ?>"><?php  echo $i?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
    </div>
    <div class="clearfix"></div>