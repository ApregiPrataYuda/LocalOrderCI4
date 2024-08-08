
          <?php $Grups =  session()->get('Grup');

          if ($Grups == 'ADMINISTRATOR') {
            echo '
             <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Administrator</li>
            <li class="nav-item Active">
            <a style="color: RGB(245, 245, 245);" href="'.site_url('Parts-Division').'" class="nav-link">
            <i class="nav-icon  fas fa-shopping-basket"></i>
              <p style="color: RGB(245, 245, 245);">
              Master Part Divisi
              </p>
            </a>
            </li> 
            <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Local-order').'" class="nav-link">
              <i class="nav-icon  fas fa-truck"></i>
                <p style="color: RGB(245, 245, 245);">
                Local Order
                </p>
              </a>
              </li>

              <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Reports').'" class="nav-link">
              <i class="nav-icon  fas fa-file-pdf"></i>
               <p style="color: RGB(245, 245, 245);">
                Report
               </p>
              </a>
             </li>

             <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Update-Local-Order').'" class="nav-link">
              <i class="nav-icon  fas fa-edit"></i>
               <p style="color: RGB(245, 245, 245);">
                Update Local Order
               </p>
              </a>
             </li>

             <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Check-Stock-Last').'" class="nav-link">
              <i class="nav-icon  fas fa-search"></i>
               <p style="color: RGB(245, 245, 245);">
               Report Stock
               </p>
              </a>
             </li>
            ';

          }elseif ($Grups == 'STAFF') {
             
            echo '
              <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Admin</li>
            <li class="nav-item Active">
            <a style="color: RGB(245, 245, 245);" href="'.site_url('Parts-Division').'" class="nav-link">
            <i class="nav-icon  fas fa-cubes"></i>
              <p style="color: RGB(245, 245, 245);">
              Master Part Divisi
              </p>
            </a>
            </li> 
            <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Local-order').'" class="nav-link">
              <i class="nav-icon  fas fa-clipboard"></i>
                <p style="color: RGB(245, 245, 245);">
                Local Order
                </p>
              </a>
              </li>

              <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Reports').'" class="nav-link">
              <i class="nav-icon  fas fa-file-pdf"></i>
               <p style="color: RGB(245, 245, 245);">
                Report
               </p>
              </a>
             </li>

             <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Update-Local-Order').'" class="nav-link">
              <i class="nav-icon  fas fa-edit"></i>
               <p style="color: RGB(245, 245, 245);">
                Update Local Order
               </p>
              </a>
             </li>

             <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="'.site_url('Check-Stock-Last').'" class="nav-link">
              <i class="nav-icon  fas fa-search"></i>
               <p style="color: RGB(245, 245, 245);">
               Report Stock
               </p>
              </a>
             </li>
            ';





          }




          ?>
          
          
          <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Exit</li>
            <li class="nav-item Active">
              <a style="color: RGB(245, 245, 245);" href="<?= site_url('Logout') ?>" id="btn-keluar" class="nav-link">
                <i class="nav-icon  fas fa-reply"></i>
                <p style="color: RGB(245, 245, 245);">
                Logout
                </p>
              </a>
            </li>
          </ul>
          </li>
          </ul>
          </li>