<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="deleteCardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-5">
                <h4 class="fw-semibold mb-4">Do you really want to delete?</h4>
                <button type="button" class="btn btn-danger" id="confirmDelete" data-id="">Yes, delete it</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No, keep it</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="inactiveCardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-5">
                <h4 class="fw-semibold mb-4">Do you really want to Deactivate it?</h4>
                <button type="button" class="btn btn-danger">Yes, delete it</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No, keep it</button>
            </div>
        </div>
    </div>
</div>
<!-- WhatsApp Modal -->
<div class="modal fade" id="whatsAppModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Send WhatsApp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 pe-3">
                        <label for="">From</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">To</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">Body</label>
                        <textarea name="" id="" class="form-control" rows="5">Message...</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Send Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 pe-3">
                        <label for="">From</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">To</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">CC</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">BCC</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">Subject</label>
                        <input type="text" class="form-control" placeholder="jeera blade">
                    </div>
                    <div class="mb-3 pe-3">
                        <label for="">Body</label>
                        <textarea name="" id="" class="form-control" rows="5">Message...</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Youtube Modal -->
<div class="modal fade" id="youtubeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style=" max-width: 65%; ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs Modal -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFAQ" aria-labelledby="offcanvasExampleLabel" >
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Frequently Asked Questions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Question 1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Questions 2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Question 3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="newFAQModal" tabindex="-1" aria-labelledby="newFAQModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFAQModalLabel">Frequently Asked Questions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionNewExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNewOne" aria-expanded="true" aria-controls="collapseNewOne">
                                Question 1
                            </button>
                        </h2>
                        <div id="collapseNewOne" class="accordion-collapse collapse show" data-bs-parent="#accordionNewExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                                modify any of this with custom CSS or overriding our default variables. It's also worth noting
                                that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                                does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNewTwo" aria-expanded="false" aria-controls="collapseNewTwo">
                                Question 2
                            </button>
                        </h2>
                        <div id="collapseNewTwo" class="accordion-collapse collapse" data-bs-parent="#accordionNewExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                                modify any of this with custom CSS or overriding our default variables. It's also worth noting
                                that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                                does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNewThree" aria-expanded="false" aria-controls="collapseNewThree">
                                Question 3
                            </button>
                        </h2>
                        <div id="collapseNewThree" class="accordion-collapse collapse" data-bs-parent="#accordionNewExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                                modify any of this with custom CSS or overriding our default variables. It's also worth noting
                                that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                                does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




