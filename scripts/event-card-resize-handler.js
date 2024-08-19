// This file contains code that changes the class of the `event-card` component based
// on the current window size. it can work for any component that has several variants
// provided `componentClass` and `variantClasses` are provided in `setCurrentScreenAndUpdateComponent`
// `componentClass` is used to grab all the components with that class name
// `variantClasses` contain the various class names that component can have
// for instance,
// mobile should use event-card--sm
// tablet should use event-card--md
// desktop should use event-card--lg

// `toggleElementClass` takes a component, a target variant class and a list of all variant classes
// it removes any existing variant classes and adds the target variant class


const desktop = "desktop";
const tablet = "tablet";
const mobile = "mobile";

const tabletScrBreakPoint = 768;
const mobileScrBreakPoint = 480;

let currentScreenType = null;


// Toggles the specified class on an HTML element based on the presence of target classes.
const toggleComponentClass = (element, newClassName, variantClassNames) => {
    variantClassNames.forEach((className) => {
        if (element.classList.contains(className)) {
            element.classList.remove(className);
        }
    })

    element.classList.add(newClassName);
};

const updateComponent = (screenType, componentClass, variantClasses) => {
    const components = document.querySelectorAll(componentClass);
    
    components.forEach((btn) => {
        if (screenType === mobile) {
            toggleComponentClass(btn, 'event-card--sm', variantClasses);
        } else if (screenType === tablet) {
            toggleComponentClass(btn, 'event-card--md', variantClasses);
        } else if (screenType === desktop) {
            toggleComponentClass(btn, 'event-card--lg', variantClasses);
        }
    })
}

const setCurrentScreenAndUpdateComponent = (type) => {
    if (currentScreenType != type) {
        currentScreenType = type;
        
        // component changes should occur here
        // console.log(currentScreenType);

        const componentClass = ".event-card"
        const variantClasses = ['event-card--sm', 'event-card--md', 'event-card--lg'];
        updateComponent(currentScreenType, componentClass, variantClasses);
    }
}


const getMediaQueriesObj = () => {
    return {
        desktop: window.matchMedia(`(min-width: ${tabletScrBreakPoint + 1}px)`),
        tablet: window.matchMedia(`(min-width: ${mobileScrBreakPoint + 1}px)`),
        mobile: window.matchMedia(`(min-width: 0px)`)
    };
}


const handleResize = () => {    
    const mediaQueriesObj = getMediaQueriesObj();

    for (let [screenType, mediaQuery] of Object.entries(mediaQueriesObj)) {
        if (mediaQuery.matches) {
            setCurrentScreenAndUpdateComponent(screenType);
            break;
        }
    }
}



window.addEventListener('resize', handleResize);
handleResize();