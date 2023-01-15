<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Commercial Support</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <fieldset>

                    <div class="form-group mb-4">
                        <label for="commercial_support_received">Commercial Support Received</label>
                        <select id="commercial_support_received" class="form-control" name="has_commercial_support"
                            data-placeholder="(Select one)">
                            <option selected></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <h5>If the activity was COMMERCIALLY SUPPORTED...</h5>
                        <hr>
                        <p>Complete the table below. If you have this information already available electronically, then simply include it as part of Attachment 7. List the names of the commercial supporters of this activity and the dollar value of any monetary commercial support and/or indicate in-kind support [JAC12, SCS 3.4-3.6].</p>
                        <hr>
                    </div>

                    <div class="form-group mb-5">
                        <div class="ActivityTableContentWrap">
                            <table id="AddCommercialActivity" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="commercialSupport">Name of commercial supporter</th>                                          
                                        <th class="commercialSupport">Grant Number</th>
                                        <th class="commercialSupport">Amount $US</th>
                                        <th class="inKind">In-kind</th>
                                        <th class="text-left attachment7Title">Attachment #7</th>
                                    </tr>
                                </thead>
                                <tbody>                                        
                                    <tr>
                                        <td><input class="form-control" type="text"
                                                name="commercial_supporters[1][name]"></td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                name="commercial_supporters[1][grant_id]" value="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                name="commercial_supporters[1][amount]">
                                        </td>
                                        <td class="text-left">
                                            <div class="checkbox checkbox-primary mt-8">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="commercial_supporters[1][in_kind]">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group custom-file mt-8">
                                                <input type="file" class="custom-file-input"
                                                    id="support_attachment_7_1" name="support_attachment_7_1">                                              
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text_Content mb-3">
                                <p>(If there are additional commercial supporters, please attach a separate page
                                    using the same column headings.)</p>
                            </div>

                            <div class="text-right mb-5">
                                <button id="addMoreCommercialActivity" type="button" class="btn btn-primary btn-sm">Add
                                    more</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="display-block">&nbsp;</label>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>

                </fieldset>                

                
            </div>
        </div>
    </div>
</div>