<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
		$Form

          <% if ShowKeyword  %>
             <h3>Keyword: $ShowKeyword </h3>

            <% if SearchContact.Count = 0%>    
           <p>
            No items found!
            <span>Sorry, please try a different search </span>
           </p>
           <% end_if %>

          <% end_if %>


            <% if PaginatedPages %>

               <table class="table table-hover">
                  <thead>
                    <tr>
                       <th>Firstname</th>
                       <th>Lastname</th>
                       <th>Contact</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 <% loop PaginatedPages %>
                   <tr>
                      <td>$FirstName</td>
                      <td>$Surname</td>
                      <td>
                        <i class='fa fa-envelope'></i> $Email <br/>
                        <i class='fa fa-mobile'></i> $Mobile <br/>
                        <i class="fa fa-phone"></i> $Phone <br/>
                        <i class="fa fa-home"></i> $Address <br/>
                        <i class="fa fa-facebook-square"></i> $FacebookLink <br/>
                        <i class="fa fa-linkedin-square"></i> $LinkedinLink <br/>
                        <i class="fa fa-twitter-square"></i> $TwitterLink <br/>
                      </td>
                      <td><a href="/edit-contact?ID=$ID" class="btn" role="button">Edit</a></td>
                   </tr>
                 <% end_loop %>
                 </tbody>
               </table>


            <% if $PaginatedPages.MoreThanOnePage %>
                <div class="row row-centered">

                        <div class="col-sm-8">
                                <div class="paginator">
                                    <ul class="pagination">
                                        <% if $PaginatedPages.NotFirstPage %>
                                            <li><a href="$PaginatedPages.PrevLink">&laquo;</a></li>
                                        <% end_if %>      
                                        <% loop $PaginatedPages.Pages %>
                                            <% if $CurrentBool %>
                                                <li class="active"><a href="#">$PageNum</a></li>
                                            <% else %>
                                                <li><a href="$Link">$PageNum</a></li>
                                            <% end_if %>
                                        <% end_loop %>    
                                        <% if $PaginatedPages.NotLastPage %>
                                            <li><a href="$PaginatedPages.NextLink">&raquo;</a></li>
                                        <% end_if %>
                                    </ul>
                                </div>
                        </div>

                </div>
            <% end_if %>          



          <% end_if %>
                
</div>
