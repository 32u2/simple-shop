# Simple Shop

## Brief

### Phase 1 – Catalogue

Please create the following pages in the application:

- home page
- grid of products, each product should display:
- Image
- Name
- Price
- Link to single product page
- Single product Page 
- display product details:
- Image
- Name
- Price
- Login page
- Manage Products –  for logged in users only
- Link to new product form
- table of products: 
- Image
- Name
- Price
- Link to edit product form
- button to delete product, should confirm “are you sure?”
- New / Edit Product Form – for logged in users only
- inputs:
- Image
- Name
- Price
- Button to Save
- Button to Cancel

Each page should have a header with title and navigation menu to all accessible pages.

The Interface should be clean and user friendly.

### Phase 2 – Payment

Please add the following process:

- a “Buy” button against a product is clicked
- then the user is directed to enter an email address (which is stored)
- then the user is directed pay for the product using Stripe in test mode (your choice of checkout interface)
- after payment is complete bring the user to a “Thank you” page
- finally send a confirmation email

### Phase 3 – Deposit then payment

Make the following changes to the process:

- Change the initial payment to half the price of the product
- Charge the second half 5 minutes after payment with no user input.
- Send an additional email to confirm once full payment has been taken
