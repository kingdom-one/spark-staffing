import ChurchProfile from './modules/churchProfileScripts';
import { sparkCopyrightInjection } from './modules/copyright';
import { sparkFeaturedJob } from './modules/featuredJob';
const churchProfile = new ChurchProfile();

sparkCopyrightInjection();
// sparkFeaturedJob();
setTimeout(sparkFeaturedJob, 7000);
