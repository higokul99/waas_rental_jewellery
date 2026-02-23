# Goal Description
The user wants to complete the unfinished coding for an Instagram-style story viewer. The core structure (`index.html`) and logic (`main.js`) for the story viewer have been implemented, but the necessary CSS styles are missing from `style.css`. We need to extract the styles from the standalone prototype (`story.html`), adapt the selectors to fit the classes/IDs used in `index.html` and `main.js`, and append them to `style.css`.

## Proposed Changes

### CSS Styles
#### [MODIFY] style.css
- Extract all story viewer-related CSS rules from the `<style>` block in `story.html`.
- Rename selectors to match the integrated version's structure:
  - `#storyPage` -> `.story-overlay`
  - `#storyCatStrip` -> `.story-cat-strip`
  - `.sv-cat-bubble` -> `.story-cat-bubble`
  - `.sv-cat-thumb` -> `.story-cat-bubble-img`
  - `.sv-cat-label` -> `.story-cat-bubble-label`
  - `#storyTopBar` -> `.story-topbar`
  - `#storyProgressBars` -> `.story-progress-bars`
  - `.sv-prog-seg` -> `.story-progress-seg`
  - `.sv-prog-fill` -> `.story-progress-fill`
  - `#storyHeaderRow` -> `.story-header-info`
  - `.sv-avatar` -> `.story-avatar-sm img`
  - `.sv-cat-name` -> `.story-cat-name`
  - `.sv-time-ago` -> `.story-time-ago`
  - `#storyBackBtn` -> `.story-close-btn`
  - `#storyImgArea` -> `.story-img-area`
  - `.sv-tap-zone` -> `.story-tap-left, .story-tap-right`
  - `.sv-cat-arrow` -> `.story-swipe-hint`
  - `#storyBottomPanel` -> `.story-bottom-panel`
  - `.sv-handle` -> `.story-drag-handle`
  - `.sv-price-row` -> `.story-price-row`
  - `.sv-actions` -> `.story-actions`
  - `.sv-btn-circle` -> `.story-btn-wish, .story-btn-view`
  - `#svSpinner` -> `.story-spinner`
  - `#svPauseDot` -> `.story-paused-dot`
  - Prefix IDs with `story` where appropriate based on `index.html` (e.g., `#storyBadge`, `#storyProductName`, `#storyPriceCurrent`, `#storyPriceOriginal`, `#storyPriceSave`, `#storyDescWrap`, `#storyDesc`, `#storyReadMore`, `#storyWish`, `#storyAddBag`, `#storyViewFull`).
- The overlay should be `opacity: 0` and `pointer-events: none` by default, but become active with the `.open` class. Wait, let me check how `main.js` toggles it: `svOverlay.classList.add('open')`. I need to ensure `.story-overlay` has this transition.

## Verification Plan

### Browser Verification
- Open `index.html` in the browser subagent.
- Click on one of the "Shop By Category" bubbles (e.g., Anklets).
- Verify that the story viewer overlay opens smoothly and covers the screen.
- Verify that the progress bars advance and the images load correctly.
- Ensure that the text styling, buttons, bottom sheet, and tap-zones function correctly across the application.
- Tap the right side of the image to go to the next product and verify it works.
- Close the story overlay and verify it dismisses cleanly.
