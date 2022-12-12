
<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Authors
                               </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('author.index') }}">
                                       Authors List
                                   </a>
                                   <a class="dropdown-item" href="{{ route('author.create') }}">
                                       New Author
                                   </a>
                               </div>
                           </li>
                           <li class="nav-item dropdown">
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Books
                               </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('book.index') }}">
                                       Books List
                                   </a>
                                       <a class="dropdown-item" href="{{ route('book.create') }}">
                                       New Book
                                   </a>
                               </div>
                           </li>
