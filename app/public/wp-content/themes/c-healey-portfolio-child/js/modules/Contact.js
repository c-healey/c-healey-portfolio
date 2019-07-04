import $ from 'jquery';

class Contact {
	constructor(){
		this.events();
	}
	events (){
		/*$("#contact").on("click", ".delete-contact", this.deleteContact);
		$("#contact").on("click", ".edit-contact", this.editContact.bind(this));
		$("#contact").on("click", ".update-contact", this.updateContact.bind(this)); */
		$(".submit-contact").on("click", this.createContact.bind(this));

	}
	//Methods go here
	editContact(e){
		var thisContact = $(e.target).parents("li");
		if(thisContact.data("state") == "editable"){
			this.makeContactReadOnly(thisContact);

		} else {
			this.makeContactEditable(thisContact);

		}
	}
	makeContactEditable(thisContact){
		
		thisContact.find(".edit-contact").html('<i class="fa fa-times"aria-hidden="true"></i>Cancel');
		thisContact.find(".contact-name, .contact-message").removeAttr("readonly").addClass("contact-active-field");
		thisContact.find(".update-contact").addClass("update-contact--visible");
		thisContact.data("state", "editable");
	}

	makeContactReadOnly (thisContact){
		
		thisContact.find(".edit-contact").html('<i class="fa fa-pencil"aria-hidden="true"></i>Edit');
		thisContact.find(".contact-name, .contact-message").attr("readonly", "readonly").removeClass("contact-active-field");
		thisContact.find(".update-contact").removeClass("update-contact--visible");
		thisContact.data("state", "cancel");
	}

	deleteContact(e){
		var thisContact = $(e.target).parents("li");
		
		$.ajax({
			beforeSend: (xhr) => {
				xhr.setRequestHeader('X-WP-Nonce', chealeyData.nonce);
			},
			url: chealeyData.root_url + '/wp-json/wp/v2/contact/' + thisContact.data('id'),
			type: 'DELETE',
			
			success: (response) => {
				thisContact.slideUp();
				console.log('congrats');
				console.log (response);
				
			},
			error: (response) => {
				console.log('sorry');
				console.log (response);
			}


		});

	}
	updateContact(e){
		var thisContact = $(e.target).parents("li");
		var ourUpdatedPost = {
			'name': thisContact.find('.contact-name').val(),
			'content': thisContact.find('.contact-message').val()
		};
		$.ajax({
			beforeSend: (xhr) => {
				xhr.setRequestHeader('X-WP-Nonce', chealeyData.nonce);
			},
			url: chealey.root_url + '/wp-json/wp/v2/contact/' + thisContact.data('id'),
			type: 'POST',
			data: ourUpdatedPost,
			success: (response) => {
				this.makeContactReadOnly(thisContact);
				console.log('congrats');
				console.log (response);

			},
			error: (response) => {
				console.log('sorry');
				console.log (response);
			}


		});

	}
	createContact(e){
		
		var ourNewPost = {
			'title': $(".new-contact-name").val(),
			'content':$(".new-contact-message").val(),
			'status': 'publish'
		};
		$.ajax({
			beforeSend: (xhr) => {
				xhr.setRequestHeader('X-WP-Nonce', chealeyData.nonce);
			},
			url: chealeyData.root_url + '/wp-json/wp/v2/contact/',
			type: 'POST',
			data: ourNewPost,
			success: (response) => {
				$(".new-contact-name, .new-contact-message").val('');
				$(`
					<li data-id="${response.id}">
			          <input readonly class="contact-name" value="${response.title.raw}">
			          <span class="edit-contact"><i class="fa fa-pencil"aria-hidden="true"></i>Edit</span>
			          <span class="delete-contact"><i class="fa fa-trash-o"aria-hidden="true"></i>Delete</span>
			          <textarea readonly class="contact-mesage-field">${response.content.raw}</textarea>
			          <span class="update-contact btn btn--blue btn--small"><i class="fa fa-arrow-right"aria-hidden="true"></i>Save</span>
			        </li>
					`).prependTo("#contact").hide().slideDown();

				console.log('congrats');
				console.log (response);
			},
			error: (response) => {
				if(response.responseText == "You have reached your contact limit"){
					$(".contact-limit-message").addClass("active");
				}
				console.log('sorry');
				console.log (response);
			}


		});

	}

}
export default Contact;