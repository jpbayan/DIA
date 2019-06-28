<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
		$Form


            <% if PaginatedPages %>

               <div class="table-responsive">
               <table class="table table-hover table-condensed">
                  <thead>
                    <tr>
                       <th>Record</th>
                       <th>RecordID</th>
                       <th>Species common name</th>
                       <th>Species  scientific name</th>
					   <th>Species abbreviation</th>
					   <th>AGE</th>
					   <th>WANPLUM</th>
					   <th>PLPHASE</th>
					   <th>SEX</th>
					   <th>COUNT</th>
					   <th>NFEED</th>
					   <th>OCFEED</th>
					   <th>NSOW</th>
					   <th>OCSOW</th>
					   <th>NSOICE</th>
					   <th>OCSOICE</th>
					   <th>OCSOSHP</th>
					   <th>OCINHD</th>
					   <th>NFLYP</th>
					   <th>OCFLYP</th>
					   <th>NACC</th>
					   <th>OCACC</th>
					   <th>NFOLL</th>
					   <th>OCFOL</th>
					   <th>OCMOULT</th>
					   <th>OCNATFED</th>
                    </tr>
                  </thead>
                  <tbody>
                 <% loop PaginatedPages %>
                   <tr>
                      <td>$Record</td>
                      <td>$RecordID</td>
                      <td>$SpeciesCommonName</td>
                      <td>$SpeciesScientificName</td>
                      <td>$SpeciesAbbreviation</td>
                      <td>$Age</td>
                      <td>$WANPLUM</td>
                      <td>$PLPHASE</td>
                      <td>$Sex</td>
                      <td>$Count</td>
                      <td>$NFEED</td>
                      <td>$OCFEED</td>
                      <td>$NSOW</td>
                      <td>$OCSOW</td>
                      <td>$NSOICE</td>
                      <td>$OCSOICE</td>
                      <td>$OCSOSHP</td>
                      <td>$OCINHD</td>
                      <td>$NFLYP</td>
                      <td>$OCFLYP</td>
                      <td>$NACC</td>
                      <td>$OCACC</td>
                      <td>$NFOLL</td>
                      <td>$OCFOL</td>
                      <td>$OCMOULT</td>
                      <td>$OCNATFED</td>
                   </tr>
                 <% end_loop %>
                 </tbody>
               </table>
			   </div>

            <% if $PaginatedPages.MoreThanOnePage %>
                <div class="row row-centered">

                        <div class="col-sm-12">
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
