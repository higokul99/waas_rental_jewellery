# Goal Description
The user wants to make the trending products on the home page clickable, directing to a new, theme-based product details view page. The new page (`product.html`) needs to match the luxury "Silver Sheen" minimalist aesthetic (black, white, and gold) and include essential e-commerce product details functionality.

## Proposed Changes

### [NEW] `product.html`
Create a new HTML page that shares the same header, footer, and basic layout structure (`drawer-menu`, `cart-drawer`, bottom navigation) as `index.html`.
The main content area will feature:
- **Breadcrumb Navigation:** Home > Bracelets > Silver Crystal Vine Bracelet
- **Image Gallery:** A main product image with a scrollable thumbnail row below it.
- **Product Details:**
  - Product Name & Badges (e.g., Best Seller, 10% Off)
  - Price (Current, Original, Savings)
  - Star Ratings / Reviews anchor
  - Metal purity label (925 Sterling Silver)
  - Short description
- **Interactive Options:**
  - Quantity selector
  - Add to Bag button (prominent, gold)
  - Wishlist button
- **Accordions/Tabs:**
  - Full Description
  - Product Details (Dimensions, Weight, Material)
  - Shipping & Returns
- **Related Products:** A horizontally scrolling section similar to the "Trending" or "Best Sellers" blocks on the homepage.

### [MODIFY] `css/style.css`
Append necessary CSS for the new product detail layout:
- `product-gallery` styles for the main image and thumbnail strip.
- `product-info-block` styles for the title, pricing, and variants.
- Accordion styles to handle the collapsible product details sections (using Bootstrap's built-in accordion or custom styling to match the theme).

### [MODIFY] `js/main.js`
- Ensure that the interactive elements on the new `product.html` page (like the image thumbnail switcher and add-to-cart toasts) are supported. We may need to add a simple image swapping function for the product gallery.

### [MODIFY] `index.html`
- Update the HTML structure of the product cards in the "Trending", "Essentials For You", and "Best Sellers" sections so that clicking the image wrapper or the product title navigates the user to `product.html`.
- For example, wrap the `<img>` and the `<h3 class="product-name">` in `<a href="product.html">` tags, or wrap the entire `.product-card` (excluding quick-add buttons).

## Verification Plan

### Browser Verification
- Open `index.html` locally using the browser subagent.
- Scroll down to the Trending or Best Sellers section.
- Click on a product card.
- Verify that it navigates successfully to `product.html`.
- On `product.html`, verify that the visual design matches the elegant Silver Sheen theme (fonts, spacing, gold accents).
- Test image gallery thumbnails to ensure the main image updates.
- Test the accordion toggles (Description, Details).
